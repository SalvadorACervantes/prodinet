<!-- Queda pendiente como llevar variable cantidad--->
<form action="{{ url('in_shopping_carts') }}" method="POST">
	@csrf
	<input type="hidden" name="product_id" value="{{$productos->id}}">
	<input type="hidden" name="size" value="{{$cantidad}}">
	<input type="submit" value="Agregar al carrito" class="btn btn-outline-success text-gray">
</form>
