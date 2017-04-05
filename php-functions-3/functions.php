<?php 

function titlecase($word) {
  $word = ucwords($word);
  return $word;
}

function capfirst($word) {
  $word = ucfirst($word);
  return $word;
}

function transformersg1($theName, $toys, $transformers, $theQuantity) {
  if ($transformers != 'nothing' && $theQuantity > 0) {
    $valid = true;
    $price = $toys[$transformers];
    $total = $price * $theQuantity;
    if ($theQuantity < 2) {
      $title = titlecase($transformers).' for '.$theName;
      $theTotal = 'Total: $'.number_format($total, 2);
      $description = $theName.' ordered '.$theQuantity.' '.$transformers.'.';
    } elseif ($theQuantity > 50) {
      $title = 'No '.titlecase($transformers).' for '.$theName;
      $transformers = 'rediculous';
      $description = 'Don&rsquo;t play around, '.$theName.', Are you a robot in disguise, besides you don&rsquo;t have $'.number_format($total, 2).'!';
    } else {
      $title = titlecase($transformers).' for '.$theName;
      $theTotal = 'Total: $'.number_format($total, 2);
      $description = $theName.' ordered '.number_format($theQuantity).' '.$transformers.'s.';
    }
  } else {
    $valid = false;
  };

  if ($valid == true) {
    return('
      <div class="card my-4 mx-auto" style="width: 20rem;">
        <img class="img-fluid" src="images/'.$transformers.'.jpg" alt="Card image cap">
        <div class="card-block">
          <h2 class="h4 card-title">'.$title.'</h2>
          <p class="card-text">'.$description.'</p>
          <p class="h5">'.$theTotal.'</p>
        </div>
      </div>
    ');
  } else {
    return('
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <p class="m-0"><strong>Oops!</strong> Pick a character.</p>
      </div>
    ');
  }
}
