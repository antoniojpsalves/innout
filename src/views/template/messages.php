<?php
if($exception) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];
}

$alertType = '';
if(isset($message) && $message['type'] == 'error') {
    $alertType = 'danger';
} else {
    $alertType = 'success';
}


if(isset($message)):
?>
    <div role="alert" class="my-3 alert alert-<?=$alertType?>">
        <?=$message['message']?>
    </div>
<?php endif;