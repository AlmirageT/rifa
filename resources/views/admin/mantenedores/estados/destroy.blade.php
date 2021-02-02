<form action="{{ route('mantenedor-estados.delete',$estado->idEstado) }}" method="POST">
    @method('DELETE')
    @csrf
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
</form>
