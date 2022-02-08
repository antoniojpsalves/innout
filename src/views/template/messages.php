<?php
if($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
}

if(isset($message)):
?>
    <div class="my-3 alert alert-danger" role="alert">
        <?= isset($message) ? $message['message'] : ''; ?>
    </div>
<?php endif;