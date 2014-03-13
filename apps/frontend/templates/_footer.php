<?php $custom = Spyc::YAMLLoad(SF_ROOT_DIR.'/config/custom.yml'); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount','<?php echo $custom["core"]["ga_id"]; ?>']);
  _gaq.push(['_setDomainName', '<?php echo $custom["core"]["domain"]; ?>']);
  _gaq.push(['_trackPageview']);
  var d = new Date();
  var dow = ['1.Sunday','2.Monday','3.Tuesday','4.Wednesday','5.Thursday','6.Friday','7.Saturday'];
  _gaq.push(['_setCustomVar', 1,'dayofweek',dow[d.getDay()],2]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<footer>
    <div class="container">
        <p>
            <!-- tyuparakubura -->
        </p>
    </div>
</footer>


