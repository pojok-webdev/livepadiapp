padicommon = {
    fillImgTotal : function(table,callback){
        callback(table.find('tbody tr').length);
    }

}
$.fn.setCombo = function(options){
    var settings = $.extend({
        selected:'selected',
        comparator:'value'
    },options)
    component = $(this)
    $(this).find('option').each(function(){
        switch(settings.comparator){
        case 'value':
            if($(this).val()===settings.selected){
                $(this).attr('selected','selected')
            }
        break
        case 'label':
            if($(this).text()===settings.selected){
                $(this).attr('selected','selected')
            }
        break
        }
    })
    return component;
}