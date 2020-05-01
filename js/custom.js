<!--script animasi scroll menu nav-->
<script type="text/javascript">
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    document.getElementById("nav").style.padding = "13px 10px";
    document.getElementById("logo").style.fontSize = "15px";
  } else {
    document.getElementById("nav").style.padding = "20px 10px";
    document.getElementById("logo").style.fontSize = "95px";
  }
}
</script>
