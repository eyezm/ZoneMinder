function submitForm( element )
{
    var form = element.form;
    if ( form.option.selectedIndex == 0 )
        form.view.value = currentView;
    else
        form.view.value = 'none';
    form.submit();
}

if ( action == "donate" && option == "go" )
{
    zmWindow();
}
