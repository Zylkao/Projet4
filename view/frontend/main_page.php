<?php $title="Blog lecture"; ?>

<?php ob_start(); ?>

<header>
  <a href='index.php?action=adminPage'>Administration</a>
</header>

<section id="content">
  <?php include('menu.php');?>
  <div id="read-area">
    <div id="chapters">
      <h2 id="chapter-title"> Lorem Ipsum</h2>
      <p id="chapter-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at suscipit arcu. Phasellus venenatis sagittis purus, in consectetur ante hendrerit nec. Duis gravida, diam vitae maximus scelerisque, mi augue efficitur urna, dictum vehicula libero leo in tortor. Donec id purus in dui pellentesque vehicula. Aenean quis quam sit amet ante volutpat rutrum sed id lectus. Cras pharetra, erat non ultricies eleifend, purus urna tristique lorem, eu ullamcorper urna nulla ac lorem. Fusce et mauris nibh. Cras sed lorem in enim dictum cursus vitae quis orci. Nunc scelerisque ligula eu velit ultricies commodo. Etiam velit est, ornare eget mi sit amet, sollicitudin porttitor nibh. Maecenas lobortis fringilla urna eu blandit. Fusce lobortis, lectus sed aliquet hendrerit, mi elit finibus nunc, ac faucibus est metus eget massa. Curabitur lectus metus, aliquam vel nisl et, venenatis interdum augue. Ut volutpat mauris justo. Nam commodo sit amet libero non mollis. Nunc felis mi, tincidunt et tortor sed, vehicula elementum arcu.

Etiam tincidunt justo urna, in rhoncus tellus suscipit et. Mauris imperdiet vehicula augue, in posuere est aliquam ac. Proin facilisis, diam vitae auctor dictum, enim augue consectetur tellus, at interdum neque libero in sapien. Ut et est elementum, dignissim turpis a, dignissim turpis. Nunc tristique risus et quam pharetra, sed venenatis ex fringilla. Nunc sed ornare diam. Sed id accumsan ante. Aliquam venenatis ligula non lacus aliquet tempus. Suspendisse id varius velit, nec gravida diam.

Fusce fermentum nunc turpis, nec consequat est faucibus quis. Pellentesque tempus metus lectus, vel tincidunt nibh consectetur non. Cras ac varius neque. Ut mattis nulla nec magna vulputate convallis. Vivamus at sagittis magna, id commodo lectus. Donec id eleifend nisi, vitae consequat mi. Maecenas tempus blandit mi, ut mollis lorem iaculis id. Pellentesque nec posuere libero.

Nunc id faucibus nulla. Aenean nec orci quis diam bibendum iaculis. Donec malesuada mauris mi, ut sodales ante eleifend vitae. Quisque nibh velit, dapibus non eleifend sed, porta vitae felis. Sed vel pretium nisi, eleifend fermentum nisi. Suspendisse in felis id velit cursus pharetra et et ipsum. Suspendisse bibendum augue vehicula felis ultricies, ut dapibus nisl malesuada. Donec nec nibh ac magna posuere tempor. Sed quis justo fringilla, auctor justo ac, consectetur nisi. Cras at maximus lacus. Nam at ex quis tortor euismod sagittis. Cras aliquet facilisis facilisis. Mauris ut sollicitudin magna. Praesent auctor sem at urna tempor sollicitudin.

Pellentesque sit amet erat vel lorem molestie elementum nec non dolor. Donec rhoncus, ligula ac ultricies consequat, nibh nulla vehicula justo, vel blandit erat quam sit amet quam. Nullam facilisis dictum neque nec pulvinar. Cras placerat interdum lacus eu lobortis. Fusce a mi porttitor, commodo turpis id, mollis libero. Integer ut magna dignissim, commodo risus nec, tempor massa. Ut in sem ac nibh eleifend cursus eu ut risus. Integer eros tortor, lacinia eu facilisis vitae, pulvinar in lacus. Ut eget odio eu risus suscipit tincidunt. Ut justo nunc, fermentum eget dui at, maximus faucibus sapien. Nam dignissim turpis aliquet egestas tristique. Aenean eget purus et nulla rutrum maximus. Donec dictum eleifend orci, sed eleifend dolor consectetur at. Aliquam a ligula consectetur, dictum leo non, mollis risus.
      </p>
    </div>
  </div>
</section>
</body>

<footer>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
