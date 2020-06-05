<script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/jquery.nice-select.min.js")}}"></script>
<script src="{{asset("js/jquery-ui.min.js")}}"></script>
<script src="{{asset("js/jquery.slicknav.js")}}"></script>
<script src="{{asset("js/mixitup.min.js")}}"></script>
<script src="{{asset("js/owl.carousel.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
<script type="text/javascript">
    function addToCart(productId) {
        $.ajax({
            url:"{{url("/cart/add")}}/"+productId,
            method:"POST",
            data:{
                qty: 1,
                _token:"{{csrf_token()}}"
            },
            success: function () {
                alert("Mua sản phẩm thành công!");
            }
        });
    }
</script>
