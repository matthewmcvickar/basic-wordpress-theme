
      </div> <!-- /.page-content -->
    </div> <!-- /.page-header-and-content-container -->

    <footer class="page-footer">
      <div class="container">
        <div class="footer-nav">
          <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
        </div>
      </div>
    </footer>

  </div>

  <?php wp_footer(); ?>

  <?php if (!is_development()): ?>

    <!-- Google Analytics. -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-TODO', 'auto');
    ga('send', 'pageview');
    </script>

  <?php endif; ?>

  <?php if (is_development()): ?>
    <!-- LiveReload. -->
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
  <?php endif; ?>

</body>

</html>
