var Nestable = function () {

    var updateOutput = function (e) {
		
     var list = e.length ? e : $(e.target),
            output = list.data('output');
			 
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable_list_1').nestable({
        group: 1
    })    
   .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));
}();

$('#nestable_list_1').nestable().on('change', function() {
	
	
});


function nestable_refresh()
{
	var Nestable = function () {

    var updateOutput = function (e) {
		
     var list = e.length ? e : $(e.target),
            output = list.data('output');
			 
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable_list_1').nestable({
        group: 1
    })    
   .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));
}();

$('#nestable_list_1').nestable().on('change', function() {
	
	
});
}