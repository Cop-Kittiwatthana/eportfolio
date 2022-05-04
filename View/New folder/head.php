<script>
		  function isInputNumber (evt){
			  var ch = String.fromCharCode(evt.which);
			  if(!(/[0-9]/.test(ch))){
				  evt.preventDefault();
			  }
			  }

		  function isInputChar (evt){
			  var ch = String.fromCharCode(evt.which);
			  if(!(/[a-z && A-Z && ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ๊ && ๋ && ๆ && ไ && ำ && ั && ็ && ใ]/.test(ch))){
				  evt.preventDefault();
			  }
			  }
			  
			  function isInputChar1 (evt){
			  var ch = String.fromCharCode(evt.which);
			  if(!(/[. && a-z && A-Z && ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ๊ && ๋ && ๆ && ไ && ำ && ั && ็ && ใ]/.test(ch))){
				  evt.preventDefault();
			  }
			  }

			  function isInputChar2 (evt){
			  var ch = String.fromCharCode(evt.which);
			  if(!(/[0-9 && a-z && A-Z && ก-ฮ && ะ && า &&  ิ &&  ี && ึ && ื && ุ && ู && เ && แ && โ && ์ && ่ && ้ && ๊ && ๋ && ๆ && ไ && ำ && ั && ็ && ใ]/.test(ch))){
				  evt.preventDefault();
			  }
			  }
			  
			  function isInputUsername (evt){
			  var ch = String.fromCharCode(evt.which);
			  if(!(/[a-z && A-Z && 0-9]/.test(ch))){
				  evt.preventDefault();
			  }
			  }
		  </script>

<!DOCTYPE html>
<html>
<head>
<style>
body  {
  background-image: url("image/SD.jpg");
  background-color: #cccccc;
}
</style>
</head>
</html>
