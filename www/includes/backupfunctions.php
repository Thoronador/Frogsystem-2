<?php
/*
    This file is part of the Frogsystem backup mechanism.
    Copyright (C) 2012  Thoronador

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

    Additional permission under GNU GPL version 3 section 7

    If you modify this Program, or any covered work, by linking or combining it
    with Frogsystem 2 (or a modified version of Frogsystem 2), containing parts
    covered by the terms of Creative Commons Attribution-ShareAlike 3.0, the
    licensors of this Program grant you additional permission to convey the
    resulting work. Corresponding Source for a non-source form of such a
    combination shall include the source code for the parts of Frogsystem used
    as well as that of the covered work.
*/


  //define the directory where backups are stored
  define('BACKUP_DIR', FS2_ROOT_PATH.'db_backup/');

  /* removes invalid tables from a given array of table names

     parameters:
         tables - (array) selected table names
  */
  function getOnlyAllowedTables($tables)
  {
    global $FD;

    //get valid tables
    $allowed = array();
    $query = mysql_query('SELECT TABLE_NAME FROM information_schema.tables '
       .'WHERE TABLE_NAME LIKE \''.$FD->config('pref').'%\' AND TABLE_SCHEMA=\''.$FD->sql()->getDatabaseName().'\'', $FD->sql()->conn());
    while ($row = mysql_fetch_assoc($query))
    {
      $allowed[] = $row['TABLE_NAME'];
    }//while
    //...and remove non-existing/other tables
    foreach($tables as $key => $value)
    {
      if (!in_array($value, $allowed))
      {
        unset($tables[$key]);
      }
    }//foreach
    return $tables;
  }


  /* returns the SQL statement that would create the structure of a given table

     parameters:
         tab      - (string) name of the table
         withDrop - (boolean) if true, DROP TABLE statement is inserted before
                    the create statement
  */
  function getTableStructure($tab, $withDrop)
  {
    global $FD;
    
    $result = "--\n-- table structure for ".$tab."\n--\n\n";
    
    $query = mysql_query('SHOW CREATE TABLE `'.$tab.'`', $FD->sql()->conn());
    if ($row = mysql_fetch_assoc($query))
    {
      if ($withDrop)
      {
        $result .= 'DROP TABLE IF EXISTS '.$tab.";\n\n";
      }
      return $result . $row['Create Table'] . ";\n\n";
    }
    return $result .'--ERROR: could not get structural info for table '.$tab."\n\n";
  }

  /* writes the data of table tab to the given file and returns true,
     if successful. Returns false, if an error occured.

     parameters:
         tab  - (string) name of the table
         file - (resource) file handle
  */
  function writeTableData($tab, &$file)
  {
    global $FD;

    $query = mysql_query('SELECT COUNT(*) AS row_count FROM `'.$tab.'`', $FD->sql()->conn());
    if ($query===false) return false;
    $row_count = mysql_fetch_assoc($query);
    $row_count = $row_count['row_count'];
    if ($row_count==0)
    {
      $success = fwrite($file, '-- table '.$tab.' has no data'."\n\n");
      return ($success!==false);
    }
    //get column names
    $query = mysql_query('SHOW COLUMNS FROM `'.$tab.'`', $FD->sql()->conn());
    $insert = 'INSERT INTO `'.$tab.'` (`';
    $hasCols = false;
    while ($row = mysql_fetch_assoc($query))
    {
      if ($hasCols)
      {
        $insert .= ', `'.$row['Field'].'`';
      }
      else
      {
        $insert .= $row['Field'].'`';
        $hasCols = true;
      }
    }//while
    if (!$hasCols) return false;
    $insert .= ")\n VALUES\n";
    $success = fwrite($file, $insert);
    if ($success===false) return false;
    //now get the data
    $hasData = false;
    $query = mysql_query('SELECT * FROM `'.$tab.'`', $FD->sql()->conn());
    while ($row = mysql_fetch_assoc($query))
    {
      if ($hasData)
      {
        fwrite($file, ",\n(");
      }
      else
      {
        fwrite($file, '(');
        $hasData = true;
      }
      $hasCols = false;
      foreach($row as $value)
      {
        if ($hasCols)
        {
          fwrite($file, ", '".savesql($value)."'");
        }
        else
        {
          fwrite($file, "'".savesql($value)."'");
          $hasCols = true;
        }
      }//foreach
      fwrite($file, ')');
    }//while
    unset($query);
    return (false !== fwrite($file, ";\n\n"));
  }//func

  /* writes the data of the given tables to the given file.
     Returns true in case of success, or false if an error occured.

     parameters:
         tabs - (array of strings) the table names
         file_path - (string) path of the backup file to be created
         withDrop  - (boolean) if set to true, the backup file will contain
                     DROP TABLE statements before the data of the tables
  */
  function writeTablesToFile($tabs, $file_path, $withDrop=true)
  {
    $file = fopen($file_path, 'wb');
    if ($file === false) return false;
    foreach($tabs as $table)
    {
      $success = fwrite($file, getTableStructure($table, $withDrop));
      if ($success===false)
      {
        fclose($file);
        return false;
      }
      if (!writeTableData($table, $file))
      {
        fclose($file);
        return false;
      }
    }//foreach
    fclose($file);
    return true;
  }//func

  /* returns true, if the given filename is a acceptable backup file name */
  function isAcceptableBackupFilename($fn)
  {
    //don't want the user to overwrite .htaccess or similar files
    if (substr(strtolower($fn),0,3)==='.ht') return false;
    //not path changes
    if ((strpos($fn, '/')!==false) || (strpos($fn, '\\')!==false)) return false;
    //no parent directory
    if ((strpos($fn, '../')!==false) || (strpos($fn, '..\\')!==false)) return false;
    //no cluttering with current directory
    if ((strpos($fn, './')!==false) || (strpos($fn, '.\\')!==false)) return false;
    //That's it for now.
    return true;
  }//func
?>