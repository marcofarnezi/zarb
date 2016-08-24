$(document).ready(function() {
	$('.produto').trigger('change');
	$('.itemvenda0').find('button').hide()
	$('#moreItem').click(function() {
		var element = $( ".itemvenda0" ).clone();
		$(element).removeClass('itemvenda0')
		$(element).addClass('itemvenda1')
		$(element).appendTo( "tbody" );
		$(element).find('button').show();			
		alteraElemento($(element));		
	});
});

function valorUnitario(obj) {
	var valores = jQuery.parseJSON($('#produtosValores').val());
	var objetoTr = $(obj).parents('tr');
	var quantidade = $(objetoTr).find('.quantidade').val();
	obj = $(objetoTr).find('.produto');
	$(objetoTr).find('.unitario').val(valores[$(obj).val()]);	

	if(! quantidade) {		
		quantidade = 1;
		$(objetoTr).find('.quantidade').val(quantidade);		
	}
	if(! $(obj).val()) {
		$(objetoTr).find('.total').val('');
		
	} else {
		$(objetoTr).find('.total').val(valores[$(obj).val()]*quantidade);
	}
}

function deleteElement(obj) {	
	if(! $(obj).closest('.itemvenda').hasClass('itemvenda0')) {
	    $(obj).closest('.itemvenda').remove();	   
	}
}

function alteraElemento(obj) {
	var id = $('.itemvenda').length -1;
	$(obj).find('#itemproduto0').attr('id', 'itemproduto'+id);
	$(obj).find('#itemproduto'+id).attr('name', 'item['+id+'][produto]');

	$(obj).find('#itemquantidade0').attr('id', 'itemquantidade'+id);
	$(obj).find('#itemquantidade'+id).attr('name', 'item['+id+'][quantidade]');

	$(obj).find('#itemvalor0').attr('id', 'itemvalor'+id);	

	$(obj).find('#itemtotal0').attr('id', 'itemtotal'+id);	

	$(obj).find('.form-control').val('');
}
