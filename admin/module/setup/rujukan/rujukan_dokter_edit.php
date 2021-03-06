<?php
     require_once("root.inc.php");
     require_once($ROOT."library/bitFunc.lib.php");
     require_once($ROOT."library/auth.cls.php");
     require_once($ROOT."library/textEncrypt.cls.php");
     require_once($ROOT."library/datamodel.cls.php");
     require_once($ROOT."library/currFunc.lib.php");
     require_once($ROOT."library/dateFunc.lib.php");
     require_once($ROOT."library/inoLiveX.php");
	require_once($APLICATION_ROOT."library/view.cls.php");	
     
     $view = new CView($_SERVER['PHP_SELF'],$_SERVER['QUERY_STRING']);
     $dtaccess = new DataAccess();
     $enc = new textEncrypt();     
	$auth = new CAuth();
     $err_code = 0;
	
     $thisPage = "rujukan_dokter_edit.php?";
     $backPage = "rujukan_dokter_view.php";
     
	$plx = new InoLiveX("");
	
     if(!$auth->IsAllowed("registrasi",PRIV_READ)){
          die("access_denied");
          exit(1);
          
     } elseif($auth->IsAllowed("registrasi",PRIV_READ)===1){
          echo"<script>window.parent.document.location.href='".$ROOT."login.php?msg=Session Expired'</script>";
          exit(1);
     }
	
	
	
	if($_POST["x_mode"]) $_x_mode = $_POST["x_mode"];
	else $_x_mode = "New";
   
	if($_POST["rujukan_dokter_id"])  $opPaketId = $_POST["rujukan_dokter_id"];
 
     if ($_GET["id"]) {
          if ($_POST["btnDelete"]) { 
               $_x_mode = "Delete";
          } else { 
               $_x_mode = "Edit";
               $opPaketId = $enc->Decode($_GET["id"]);
          }
         
          $sql = "select a.* from global.global_rujukan_dokter a 
				where rujukan_dokter_id = ".QuoteValue(DPE_CHAR,$opPaketId);
          $rs_edit = $dtaccess->Execute($sql);
          $row_edit = $dtaccess->Fetch($rs_edit);
          $dtaccess->Clear($rs_edit);
          
          $_POST["rujukan_dokter_nama"] = $row_edit["rujukan_dokter_nama"];
          $_POST["rujukan_dokter_alamat"] = $row_edit["rujukan_dokter_alamat"];
	  	$_POST["rujukan_dokter_telp"] = $row_edit["rujukan_dokter_telp"];
	  	$_POST["rujukan_dokter_id"] = $row_edit["rujukan_dokter_id"];
	  
		
     }

	if($_x_mode=="New") $privMode = PRIV_CREATE;
	elseif($_x_mode=="Edit") $privMode = PRIV_UPDATE;
	else $privMode = PRIV_DELETE;    

     if ($_POST["btnSave"] || $_POST["btnUpdate"]) {          
          if($_POST["btnUpdate"]){
               $rujukanRSId = & $_POST["rujukan_dokter_id"];
               $_x_mode = "Edit";
          }
	  
	  if($_POST["rujukan_dokter_nama"]) $err_code = clearbit($err_code,1);
	  else $err_code = setbit($err_code,1);
	  
          if ($err_code == 0) {
               $dbTable = "global.global_rujukan_dokter";
               
               $dbField[0] = "rujukan_dokter_id";   // PK
               $dbField[1] = "rujukan_dokter_nama";
               $dbField[2] = "rujukan_dokter_alamat";
               $dbField[3] = "rujukan_dokter_telp";
               $dbField[4] = "rujukan_dokter_kode_rekening_poin";
               $dbField[5] = "rujukan_dokter_bank";
               
			
               if(!$rujukanRSId) $rujukanRSId = $dtaccess->GetNewId("global.global_rujukan_dokter","rujukan_dokter_id");   
               $dbValue[0] = QuoteValue(DPE_CHAR,$rujukanRSId);
               $dbValue[1] = QuoteValue(DPE_CHAR,$_POST["rujukan_dokter_nama"]);  
               $dbValue[2] = QuoteValue(DPE_CHAR,addslashes($_POST["rujukan_dokter_alamat"]));
               $dbValue[3] = QuoteValue(DPE_CHAR,$_POST["rujukan_dokter_telp"]);
               $dbValue[4] = QuoteValue(DPE_CHAR,$_POST["rujukan_dokter_kode_rekening_poin"]);
               $dbValue[5] = QuoteValue(DPE_CHAR,$_POST["rujukan_dokter_bank"]);
			
               $dbKey[0] = 0; // -- set key buat clause wherenya , valuenya = index array buat field / value
               $dtmodel = new DataModel($dbTable,$dbField,$dbValue,$dbKey);
   
               if ($_POST["btnSave"]) {
                    $dtmodel->Insert() or die("insert  error");	
               
               } else if ($_POST["btnUpdate"]) {
                    $dtmodel->Update() or die("update  error");	
               }
               
               unset($dtmodel);
               unset($dbField);
               unset($dbValue);
               unset($dbKey);
               unset($dbField);   
			}
			
          header("location:rujukan_dokter_view.php");
          exit();
        }
			
     if ($_POST["btnDelete"]) {
          $opPaketId = & $_POST["cbDelete"];
          
          for($i=0,$n=count($opPaketId);$i<$n;$i++){
               $sql = "delete from klinik.klinik_biaya 
                         where rujukan_dokter_id = ".QuoteValue(DPE_CHAR,$opPaketId[$i]);
               $dtaccess->Execute($sql,DB_SCHEMA);
          }
          
          header("location:rujukan_dokter_view.php");
          exit();    
     } 

	$sql = "select * from klinik.klinik_split where split_flag like '".SPLIT_PERAWATAN."' order by split_id";
     $rs = $dtaccess->Execute($sql,DB_SCHEMA);
     $dataSplit = $dtaccess->FetchAll($rs);
     
     
?>

<?php echo $view->RenderBody("inosoft.css",false); ?>

<script language="javascript" type="text/javascript">

<? $plx->Run(); ?>

function CheckDataSave(frm) {
     
     if(!frm.rujukan_dokter_nama.value){
		alert('Nama Dokter Harus Diisi');
		frm.rujukan_dokter_nama.focus();
          return false;
	}else{
          document.frmEdit.submit();     
     }
     
}

</script>

<table width="100%" border="1" cellpadding="1" cellspacing="1">
    <tr class="tableheader">
        <td width="100%">&nbsp;Edit Asal Rujukan </td>
    </tr>
</table>

<form name="frmEdit" method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
<table width="100%" border="1" cellpadding="1" cellspacing="1">
<tr>
     <td>
     <fieldset>
     <legend><strong>Setup Asal Rujukan</strong></legend>
     <table width="100%" cellpadding="1" cellspacing="1">
     	<tr>
               <td align="right" class="tablecontent" width="30%"><strong>Nama Dokter<?php if(readbit($err_code,1) || readbit($err_code,2)){?>&nbsp;<font color="red">(*)</font><?}?></strong>&nbsp;</td>
               <td width="70%">
                    <?php echo $view->RenderTextBox("rujukan_dokter_nama","rujukan_dokter_nama","50","255",$_POST["rujukan_dokter_nama"],"inputField", null,false);?>
               </td>
          </tr>
          <tr>
               <td align="right" class="tablecontent" width="30%"><strong>Alamat&nbsp;</td>
               <td width="70%">
                    <?php echo $view->RenderTextArea("rujukan_dokter_alamat","rujukan_dokter_alamat","5","45",$_POST["rujukan_dokter_alamat"],"inputField", null,false);?>
               </td>
          </tr>
	  <tr>
	       <td align="right" class="tablecontent" width="30%"><strong>Telp.</td>
	       <td width="70%">
		    <?php echo $view->RenderTextBox("rujukan_dokter_telp","rujukan_dokter_telp","50","255",$_POST["rujukan_dokter_telp"],"inputField", null,false);?>
	       </td>
	  </tr>
       <tr>
            <td align="right" class="tablecontent" width="30%"><strong>Nama Bank</td>
            <td width="70%">
              <?php echo $view->RenderTextBox("rujukan_dokter_bank","rujukan_dokter_bank","50","255",$_POST["rujukan_dokter_bank"],"inputField", null,false);?>
            </td>
       </tr>
       <tr>
            <td align="right" class="tablecontent" width="30%"><strong>Kode Rekening Poin</td>
            <td width="70%">
              <?php echo $view->RenderTextBox("rujukan_dokter_kode_rekening_poin","rujukan_dokter_kode_rekening_poin","50","255",$_POST["rujukan_dokter_kode_rekening_poin"],"inputField", null,false);?>
            </td>
       </tr>
          
          <tr>
               <td colspan="2" align="right">
                    <?php echo $view->RenderButton(BTN_SUBMIT,($_x_mode == "Edit")?"btnUpdate":"btnSave","btnSave","Simpan","button",false,"onClick=\"javascript:return CheckDataSave(document.frmEdit);\"");?>
                    <?php echo $view->RenderButton(BTN_BUTTON,"btnBack","btnBack","Tutup","button",false,"onClick=\"self.parent.tb_remove();\"");?>                    
               </td>
          </tr>
     </table>
     </fieldset>
     </td>
</tr>
</table>

<script>document.frmEdit.rujukan_dokter_nama.focus();</script>

<? if (($_x_mode == "Edit") || ($_x_mode == "Delete")) { 
echo $view->RenderHidden("rujukan_dokter_id","rujukan_dokter_id",$opPaketId);
} 

echo $view->RenderHidden("x_mode","x_mode",$_x_mode);
?>
</form>
<span id="msg">
<? if ($err_code != 0) { ?>
<font color="red"><strong>Periksa lagi inputan yang bertanda (*)</strong></font>
<? }?>
<? if (readbit($err_code,1)) { ?>
<br>
<font color="green"><strong>Nama Dokter asal rujukan harus diisi</strong></font>
<? } ?>
</span>
<?php echo $view->RenderBodyEnd(); ?>