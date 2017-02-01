<div class="row">
<div class="col-md-4">
    <div id="habits"></div>
    <div id="habitsp" class="cssload-preloader cssload-loading">
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
    </div>
</div>
<div class="col-md-4">
    <div id="dailies"></div>
    <div id="dailiesp" class="cssload-preloader cssload-loading">
        <span class="cssload-slice"></span>
        <span class="cssload-slice"></span>
        <span class="cssload-slice"></span>
        <span class="cssload-slice"></span>
        <span class="cssload-slice"></span>
        <span class="cssload-slice"></span>
    </div>
</div>
<div class="col-md-4">
    <div id="tasks"></div>
    <div id="tasksp" class="cssload-preloader cssload-loading">
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
	<span class="cssload-slice"></span>
    </div>    
</div>
</div>
<script>
function loadDoc($id, $view) {
            $.ajax({
                url: $view,
                cache: false,
                beforeSend: function() {
                    $($id).hide();
                    $($id+'p').show();
                },
                success: function(result) {
                    $($id).html(result).fadeIn();
                    $($id+'p').hide();
                }
            })
}
function completeHabit($id) {
    $.post('/completions/new_comp/' + $id, null, loadDoc('#habits', '/tasks/habit_view/'))
}
function completeDaily($id) {
    $.post('/completions/new_comp/' + $id, null, loadDoc('#dailies', '/tasks/daily_view/'))
}
function completeTask($id) {
    $.post('/completions/new_comp/' + $id, null, loadDoc('#tasks', '/tasks/task_view/'))
}

loadDoc('#habits', '/tasks/habit_view/');
loadDoc('#dailies', '/tasks/daily_view/');
loadDoc('#tasks', '/tasks/task_view/');
</script>