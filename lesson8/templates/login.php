<div class="center">
   <div class="center">
      <?if (!$auth) :?>
         <form method="post">
            <input type='text' name='login' placeholder='admin'>
            <input type='password' name='pass' placeholder='123'>
            Save? <input type='checkbox' name='save'>
            <input type='submit' name='send' value='logIn'>
         </form>
      <? else :?>
         <p>Welcome, <?=$user?>!</p>
      <? endif; ?>
   </div>
</div>
