<form action="{{ route('mantenedor-caracteristicas.delete',$propiedadCaracteristica->idPropiedadCaracteristica) }}" method="POST">
    @method('DELETE')
    @csrf
	<button class="dropdown-item btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el Registro ?')">Eliminar</button>
</form>
