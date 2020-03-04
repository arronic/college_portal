<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
$(function(){
  var url = window.location.pathname;
  urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        
        $('.nav>li a').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).addClass('active');
            }
    });
});
function btoa_return(string){
    return window.btoa(string);
}
</script>
</body>
</html>


<div id="cover-spin"></div>
<script>
    function spinnerOn(){
        $('#cover-spin').css('display','block');
    }
    function spinnerOff(){
        $('#cover-spin').css('display','none');
    }
</script>

<script>
   function feedback_msg(result, time){
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: time
    });

    
    Toast.fire({
      type: result.class,
      title: result.result,
    })
   }  

</script>
<script>
  function table_title(title){
      var d = new Date();
      var n = d.getDate()+'-'+d.getMonth()+'-'+d.getFullYear();
      return title+' '+ n;
  }
</script>