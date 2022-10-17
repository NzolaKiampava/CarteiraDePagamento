<div class="modal fade" id="transferirModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: black;">Transferência</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body" style="color: black;">

        <form id="myform" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-hover">
                <tr align="center">
                    <td colspan="6"><h3>Transfer Founds</h3></td>
                </tr>


                <tr>
                    <td style="font-weight: bold;">Receiver's Bank Name: </td>

                    <td>
                        <input class="form-control" type="text" name="r_bk_name" required>
                    </td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Receiver's Name: </td>

                    <td>
                        <input class="form-control" type="text" name="r_name" required >
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Receiver's Account Number</td>

                    <td>
                        <input class="form-control" type="text" name="r_ac_number">

                    </td>
                </tr>


                <tr>
                    <td style="font-weight: bold;">SWIFT/ABA  Rounting Number</td>

                    <td>
                        <input class="form-control" type="text" name="sw_ro_number">
                    </td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Sender Account Number</td>

                    <td>
                        <input class="form-control" type="text" name="s_acc_number" required>
                    </td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Amount Transfer USD</td>

                    <td>
                        <input class="form-control" type="text" name="amount_transfer" required value="">
                    </td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Find Transfer Option</td>
                    <td>
                        <input type="text" name="opt_transf" maxlength="40" placeholder="Seu Banco" class="form-control" list="bank">

                        <datalist id="bank">
                            <option value="Local Transfer"></option>
                            <option value="BIC"></option>
                            <option value="BPC"></option>
                            <option value="BFA"></option>
                        </datalist>
                    </td>

                </tr>

                <tr>
                    <td style="font-weight: bold;">Date of Transfer</td>

                    <td>
                        <input class="form-control" type="date" name="" required>
                    </td>
                </tr>

                <tr>
                    <td style="font-weight: bold;">Transfer Description</td>

                    <td>
                        <textarea class="form-control" name="transf_description" required></textarea>
                    </td>
                </tr>


                <tr align="center">
                    <td colspan="2">
                        <input id="save_settings_button" type="submit" class="btn btn-info" name="update" style="width: 230px; background-color:#50da70;" value="Transfer Founds" onclick="collect_data(event)">
                    </td>
                </tr>
            </table>
        </form>  

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

    </div>
</div>
</div>
</div>
