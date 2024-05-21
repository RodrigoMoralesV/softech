@section('content')
@include('index')
<div class="cart-carrito ">
<button class="close-btn">X</button> 
<br>
    <div class="cart-list">
        @foreach ($cart as $productId => $item)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ $item['image'] }}" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="#">{{ $item['nombre'] }}</a></h3>
                    <h4>Precio ${{ $item['price'] }}</h4>
                    <h4 class="product-price">Cantidad <span class="qty">{{ $item['quantity'] }}x</span></h4>
                </div>
                <button class="delete"><i class="fa fa-close"></i></button>
            </div>
        @endforeach
    </div>
    <div class="cart-summary">
        <small>Productos Seleccionados</small>
        <div>
        <h5>SUBTOTAL: ${{ $total }}</h5>
        </div>
    </div>
    <div class="cart-btns">
        <button type='button' class="btn-btn light" style="border-radius: 50px;"><a href="#">Continuar</a></button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const closeBtn = document.querySelector('.close-btn');
        const cartCarrito = document.querySelector('.cart-carrito');
        closeBtn.addEventListener('click', () => {
            cartCarrito.style.display = 'none';
        });
    });
</script>
@endsection