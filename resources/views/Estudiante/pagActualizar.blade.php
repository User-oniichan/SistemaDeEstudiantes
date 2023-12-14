@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4"> Página actualizar registro elegido </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            {{ session('msj') }} 
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div> 
    @endif

    <form action="{{ route('Estudiante.xUpdate', $xActAlumnos->id) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf
        
        <div class="btn btn-dark fs-3 fw-bold">Actualizar Registro</div>
        
        @error('nomEst') 
            <div class="alert alert-danger"> El nombre es requerido </div> 
        @enderror

        @if($errors ->has('apeEst')) 
            <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                El <strong> apellido </strong> es requerido 
                <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
            </div> 
        @endif

        <input type="text" name="codEst" placeholder="Código" value="{{ $xActAlumnos->codEst }}" class="form-control mb-2" />
        <input type="text" name="nomEst" placeholder="Nombres" value="{{ $xActAlumnos->nomEst }}" class="form-control mb-2" />
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{ $xActAlumnos->apeEst }}" class="form-control mb-2" />
        <input type="text" name="fnaEst" placeholder="Fecha de nacimiento" value="{{ $xActAlumnos->fnaEst }}" class="form-control mb-2" />
        <select name="turMat" class="form-control mb-2">
            <option value="" @if(($xActAlumnos->turMat) == 1) {{ "SELECTED" }} @endif >Seleccione Turno</option>
            <option value="1" @if(($xActAlumnos->turMat) == 1) {{ "SELECTED" }} @endif >Turno Día</option>
            <option value="2" @if(($xActAlumnos->turMat) == 2) {{ "SELECTED" }} @endif >Turno Noche</option>
            <option value="3" @if(($xActAlumnos->turMat) == 3) {{ "SELECTED" }} @endif >Turno Tarde</option>
        </select>
        <select name="semMat" class="form-control mb-2" >
            <option value="">Seleccione Semestre</option>
            @for($i = 0; $i < 7; $i++) 
                <option value="{{$i}}" @if(($xActAlumnos->semMat) == 1) {{ "SELECTED" }} @endif > Semestre {{$i}} </option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="" @if(($xActAlumnos->estMat) == '') {{ "SELECTED" }} @endif >Seleccione Estado de Matrícula</option>
            <option value="0" @if(($xActAlumnos->estMat) == 0) {{ "SELECTED" }} @endif >Inactivo</option>
            <option value="1" @if(($xActAlumnos->estMat) == 1) {{ "SELECTED" }} @endif >Activo</option>
        </select>
        <button class="btn btn-primary" type="submit">Actualizar</button>
    </form>

@endsection