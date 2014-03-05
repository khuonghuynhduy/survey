<div style="margin-left: 30%;margin-right: 30%">
    <div id="header" style="text-align: center">
        <div style="font-size: 30px; font-weight: bold">Survey</div>
    </div>
<?php
	foreach($data as $survey) {
		$surveyId = $survey['Question']['id'];
?>
	<p class="notice">
		<strong>Question : </strong>
		<?php echo $survey['Question']['name'] ?>
	</p>
	<div class="ans-wrapper" style="margin-left: 20px">
		<?php 
			foreach($survey['Result'] as $answer) {
				$answerId = $answer['id']; 
		?>
		<p>
			<label for="<?php echo $answerId ?>">
				<input id="<?php echo $answerId ?>" type="radio" name="answer" value="<?php echo $answerId ?>" />
				<?php echo $answer['name'] ?>
			<label>
		</p>
            <?php } ?>
	
            <p data-survey-id="<?php echo $surveyId ?>">
                    <button id="btnSub" class="btn ans-vote" onclick="javascipt:void(0)">
                            Submit
                    </button>
                <span class="error" style="color: red;">

                </span>
            </p>
        </div>
	
<?php		
	}
?>
</div>
<script>
	var _process = 0;
	jQuery(function() {
		jQuery('.ans-vote').on('click', function() {
			if (_process)
				return;
			_process = 1;
			var p = jQuery(this).parent();
			var answer_id = jQuery(this).parents('.ans-wrapper')
                                         .find('input[type=radio]:checked').val();
			var question_id = p.attr('data-survey-id');
                        
			if (!answer_id) {
				jQuery(this).siblings('.error').text('Please choose an answer !');
				_process = 0;
				return;
			}
			jQuery.ajax({
				url      : '/questions/send',
				type     : 'post',
				data     : {
                                    answer_id  : answer_id,
                                    question_id  : question_id
				},
				dataType : 'json',
				success  : function(data) {
                                    if (data.success) {
                                        _process = 0;
                                        location.href = '/questions/view?question_id=' + question_id;
                                    }
                                    else{
                                        alert("Erorr: "+data.message);
                                        location.reload();
                                    }
				},
				error    : function() {
                                    alert("An error occurred. Press OK to refresh page");
                                    location.reload();
				}
			});
		});
	});
	
</script>