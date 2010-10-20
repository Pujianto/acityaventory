$(document).ready(function(){
	var count = 0;
	$("a#add").click(function(){
	
		count += 1;
		        $('#container').append(
				        '<tr class="records">'
				        + '<td ><div id="'+count+'" style="font-weight: bold;">' + count + ': </div></td>' 
				        + '<td><input class="items" num="' + count + '" id="item_code_' + count + '" name="item_code_' + count + '" type="text"  size="5"/></td>'
				        + '<td><input id="item_' + count + '" name="item_' + count +'" type="text" size="10" />'
				        + '    <input id="item_id_' + count + '" name="item_id_' + count +'" type="hidden"  />'
				        + '</td>'  
				        + '<td><input id="item_brand_' + count + '" name="item_brand_' + count + '" type="text"  size="8"/></td>'
				        + '<td><input id="item_amount_' + count + '" name="item_amount_' + count + '" type="text" size="6" /></td>'
				        + '<td><input id="item_price_' + count + '" name="item_price_' + count + '" type="text"  size="10" /></td>'
				        + '<td><input id="item_subtotal_' + count + '" name="item_subtotal_' + count + '" type="text"  size="10"/></td>'
   				        + '<td><input id="item_desc_' + count + '" name="item_desc_' + count + '" type="text"  size="15"/></td>'

				        + '<td><a class="remove_item" href="#boxfg" >Delete</a>'
				        + '<input id="rows_' + count + '" name="rows[]" type="hidden"  /></td></tr>'
				);
	});
	
	$("a.remove_item").live('click', function (ev) { 
    	if (ev.type == 'click') {
	        $(this).parents(".records").fadeOut();
        }
     });
     
     $(".items").live('click',function() {
	    if (!$(this).data('init')){	        
	        $(this).data('init', true);
	        $(this).autocomplete({
              minLength: 0,
              source: 
                function(re, add){
                  $.ajax({
                    url: base_url +"item/lookup_item",
                      dataType: 'json',
                      type: 'POST',
                      data: re,
                      success:    
                        function(data){
                          if(data.response =="true"){
                             add(data.message);      
                          }
                        }
                   });
                 },
                 select: 
                 
                 
                 function(event, ui) {
                 	var num_item = $(this).attr("num");
        			
                    var item_id= "#item_id_"; 
                    var id     = item_id+num_item;  
                    var item_name ="#item_";
                    var item = item_name+num_item;
                    var item_brand = "#item_brand_";
                    var brand	    = item_brand+num_item; 
                    var item_price = "#item_price_";
                    var price  = item_price+num_item;
 
                    
                    $(price).val(ui.item.sell_price);
                    $(id).val(ui.item.id)
                    $(brand).val(ui.item.brand_name)
                    $(item).val(ui.item.name)
                   
                 },		
	        });
	     }  
     });
	
});
