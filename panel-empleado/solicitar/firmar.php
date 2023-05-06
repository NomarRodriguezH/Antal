<form method="post" action="guardar_firma.php">
  <label>Firma:</label>
  <canvas id="signature-pad"></canvas>
  <input type="hidden" name="firma" id="firma">
  <button type="submit">Guardar firma</button>
</form>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script type="text/javascript">
  var canvas = document.getElementById('signature-pad');
  var signaturePad = new SignaturePad(canvas);

  var dataUrl = signaturePad.toDataURL();
  document.getElementById('firma').value = dataUrl;
</script>
