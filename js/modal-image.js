var modal = document.getElementById('myModal');

var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
    img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}

function showImage(el){
	var modal = document.getElementById('myModal');
	var modalImg = document.getElementById("img01");
	modalImg.src = el.src;
	modal.style.display = "block";
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
}
$(document).ready(function() {
	var data=[];
  currentModal = 0;

  $('.modalDialog').each(function(){
    data.push({
      id: $(this).attr('id'),
      order: $(this).data('modalorder')
    });
  })

  $('#openModalBtn').click(function(){
  	currentModal = 0;
    window.location.href = "#" + data[currentModal].id;
    $('#'+data[currentModal].id).find('.getAssignment2').prop('disabled', true);
  })

  $('.getAssignment2').click(function(){
  	if (currentModal>0) {
    	currentModal--;
      window.location.href = "#" + data[currentModal].id;
    } else {

    	window.location.href = '#'
    }
  })

  $('.getAssignment').click(function(){
  	if (currentModal<data.length - 1) {
    	currentModal++;
      if (currentModal===data.length - 1) $('#'+data[currentModal].id).find('.getAssignment').prop('disabled', true);
      window.location.href = "#" + data[currentModal].id;
    } else {
    	window.location.href = '#'
    }
  })

})
