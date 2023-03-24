
function _(id){
    return document.getElementById(id);
}

function display_form(id){

    var form = _(id);
    form.removeAttribute('hidden');

}
