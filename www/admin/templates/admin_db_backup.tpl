<!--section-start::main-->
<form method="post" action="">
<table cellpadding="1" cellspacing="1" width="100%">
    <tr><td colspan="7"><h3><!--LANG::pageinfo_title--></h3><hr></td></tr>
    <tr>
        <td></td>
        <td><b><!--LANG::table_name--></b></td>
        <td><b><!--LANG::table_rows--></b></td>
        <td><b><!--LANG::table_data--></b></td>
        <td><b><!--LANG::table_index--></b></td>
        <td><b><!--LANG::table_engine--></b></td>
    </tr>
    <!--TEXT::table_list-->
    <tr>
      <td class="space" colspan="7"></td>
    </tr>
    <!-- TODO: add some JavaScript/jQuery stuff to allow (de-)selection of all
         tables in list with one single click -->
    <tr>
        <td class="buttontd" colspan="7">
            <button class="button_new" type="submit">
                <img class="middle" alt="->" src="img/pointer.png">
                <!--LANG::do_backup-->
            </button>
         </td>
    </tr>
</table>
</form>
<!--section-end::main-->

<!--section-start::table_entry-->
    <tr>
        <td><input type="checkbox" value="<!--TEXT::table_name_esc-->" name="selected_tables[]"></td>
        <td><b><!--TEXT::table_name--></b></td>
        <td style="margin: 0.1em; padding: 0.3em; text-align: center;"><!--TEXT::table_rows--></td>
        <td><!--TEXT::table_data--></td>
        <td><!--TEXT::table_index--></td>
        <td><!--TEXT::table_engine--></td>
    </tr>
<!--section-end::table_entry-->

<!--section-start::summary-->
    <tr>
        <td colspan="2"><b>Total: <!--TEXT::tabs--> <!--LANG::tables--></b></td>
        <td><b><!--TEXT::rows--> <!--LANG::rows--></b></td>
        <td colspan="3" align="center"><b><!--TEXT::size--> <!--LANG::bytes--></b></td>
    </tr>
<!--section-end::summary-->

<!--section-start::backup-->
<form method="post" action="">
<table cellpadding="1" cellspacing="1" width="100%">
    <tr><td colspan="2"><h3><!--LANG::pageinfo_title--></h3><hr></td></tr>
    <!--TEXT::content-->
</table>
</form>
<!--section-end::backup-->

<!--section-start::no_tables-->
    <tr><td colspan="2" class="red"><!--LANG::no_tables_selected--></td></tr>
<!--section-end::no_tables-->

<!--section-start::hidden_selection-->
<input type="hidden" value="<!--TEXT::table_name_esc-->" name="selected_tables[]">
<!--section-end::hidden_selection-->

<!--section-start::options-->
    <tr>
        <td colspan="2">
          <div style="background-color: #ffc080;"><!--LANG::limitations_note--></div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
          <b><!--LANG::tables_selected--> (<!--TEXT::count_selected-->):</b> <!--TEXT::tables_selected-->

          <!--TEXT::hidden-->
        </td>
    </tr>
    <tr>
        <td class="config">
          <label for="filename"><!--LANG::filename--></label>
        </td>
        <td>
            <input type="text" name="filename" value="<!--TEXT::name_preset-->" size="25">
        </td>
    </tr>
    <tr>
        <td class="config">
          <label for="with_drop"><!--LANG::with_drop--></label>
        </td>
        <td>
            <select name="with_drop">
              <option value="1" selected><!--LANG::yes--></option>
              <option value="0"><!--LANG::no--></option>
            </select>
        </td>
    </tr>
    <tr>
      <td class="space" colspan="2"></td>
    </tr>
    <tr>
        <td class="buttontd" colspan="2">
            <button class="button_new" type="submit">
                <img class="middle" alt="->" src="img/pointer.png">
                <!--LANG::do_backup-->
            </button>
         </td>
    </tr>
<!--section-end::options-->

<!--section-start::backup_success-->
    <tr>
      <td colspan="2" class="green"><!--LANG::backup_success--><br>
      <!--LANG::file_is_at--> <!--TEXT::filename-->
      </td>
    </tr>
<!--section-end::backup_success-->