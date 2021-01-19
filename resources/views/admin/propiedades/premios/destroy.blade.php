<form action="{{ route('mantenedor-premios.delete',$premio->idPremio) }}" method="POST">
    @method('DELETE')
    @csrf
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
</form>
