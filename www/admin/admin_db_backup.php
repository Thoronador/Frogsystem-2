<?php if (!defined('ACP_GO')) die('Unauthorized access!');

  require_once(FS2_ROOT_PATH . 'includes/backupfunctions.php');

  function better_size($len)
  {
    if ($len<1500) return $len.' <!--LANG::bytes-->';
    return getsize($len/1024);
  }

  if (isset($_POST['selected_tables']) && isset($_POST['filename']) && isset($_POST['with_drop']))
  {
    //do the backup
    if (!is_array($_POST['selected_tables']))
    {
      $_POST['selected_tables'] = array($_POST['selected_tables']);
    }
    $_POST['selected_tables'] = getOnlyAllowedTables($_POST['selected_tables']);
    if (empty($_POST['selected_tables']))
    {
      $content = $adminpage->get('no_tables');
      $adminpage->addText('content', $content);
      echo $adminpage->get('backup');
    }
    else
    {
      $_POST['filename'] = trim($_POST['filename']);
      if (empty($_POST['filename']))
      {
        systext($FD->text('admin', 'note_notfilled'));
      }
      else if (!isAcceptableBackupFilename($_POST['filename']))
      {
        systext($FD->text('page', 'name_not_acceptable'),
            $FD->text('admin', 'error'), true, $FD->text('admin', 'icon_error'));
      }
      else if (file_exists(BACKUP_DIR.$_POST['filename'].'.sql'))
      {
        systext($FD->text('page', 'file_exists'),
            $FD->text('admin', 'error'), true, $FD->text('admin', 'icon_error'));
      }
      else
      {
        //finally do it
        $success = writeTablesToFile($_POST['selected_tables'],
                     BACKUP_DIR.$_POST['filename'].'.sql',
                     intval($_POST['with_drop'])!==0);
        if (!$success)
        {
          //clean up, if there still are any remains
          if (file_exists(BACKUP_DIR.$_POST['filename'].'.sql'))
            @unlink(BACKUP_DIR.$_POST['filename'].'.sql');
          systext($FD->text('page', 'backup_error'),
            $FD->text('admin', 'error'), true, $FD->text('admin', 'icon_error'));
        }
        else
        {
          $adminpage->addText('filename', $_POST['filename'].'.sql');
          $content = $adminpage->get('backup_success');
          $adminpage->addText('content', $content);
          echo $adminpage->get('backup');
        }
      }
    }//else
  }//if all is set

  ////////////////////
  // backup options //
  ////////////////////

  else if (isset($_POST['selected_tables']))
  {
    if (!is_array($_POST['selected_tables']))
    {
      $_POST['selected_tables'] = array($_POST['selected_tables']);
    }
    $_POST['selected_tables'] = getOnlyAllowedTables($_POST['selected_tables']);
    if (empty($_POST['selected_tables']))
    {
      $content = $adminpage->get('no_tables');
      $adminpage->addText('content', $content);
      echo $adminpage->get('backup');
    }
    else
    {
      //proper content - option selection
      $hidden = '';
      foreach($_POST['selected_tables'] as $table)
      {
        $adminpage->addText('table_name_esc', htmlentities($table));
        $hidden .= $adminpage->get('hidden_selection');
      }//foreach
      $adminpage->addText('tables_selected', implode('&nbsp; &nbsp;', $_POST['selected_tables']));
      $adminpage->addText('count_selected', count($_POST['selected_tables']));
      $adminpage->addText('name_preset', 'backup_'.date('Y-m-d_His'));
      $adminpage->addText('hidden', $hidden);
      $content = $adminpage->get('options');
      $adminpage->addText('content', $content);
      echo $adminpage->get('backup');
    }
  }//if POST data is set

  //////////////////////
  // default formular //
  //////////////////////

  else
  {
    $table_list = '';
    $total = array('tabs' => 0, 'rows' => 0, 'size' => 0);
    $query = mysql_query('SELECT * FROM information_schema.tables'
      .' WHERE table_name LIKE \''.$FD->config('pref').'%\''
      .' AND TABLE_SCHEMA=\''.$FD->sql()->getDatabaseName().'\' ORDER BY table_name ASC');
    while ($row = mysql_fetch_assoc($query))
    {
      $adminpage->addText('table_name', $row['TABLE_NAME']);
      $adminpage->addText('table_name_esc', htmlentities($row['TABLE_NAME']));
      $adminpage->addText('table_rows', $row['TABLE_ROWS']);
      $adminpage->addText('table_data', better_size($row['DATA_LENGTH']));
      $adminpage->addText('table_index', better_size($row['INDEX_LENGTH']));
      $adminpage->addText('table_engine', $row['ENGINE']);
      $table_list .= $adminpage->get('table_entry');
      ++$total['tabs'];
      $total['rows'] += $row['TABLE_ROWS'];
      $total['size'] += ($row['DATA_LENGTH']+$row['INDEX_LENGTH']);
    }//while

    $adminpage->addText('tabs', $total['tabs']);
    $adminpage->addText('rows', $total['rows']);
    $adminpage->addText('size', $total['size']);
    $table_list .= $adminpage->get('summary');

    $adminpage->clearTexts();
    $adminpage->addText('table_list', $table_list);
    echo $adminpage->get('main');
  }//else
?>