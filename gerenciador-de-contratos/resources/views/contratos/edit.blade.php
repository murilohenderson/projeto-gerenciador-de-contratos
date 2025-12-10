<x-layout title="Editar contrato N.º '{{ $contrato->numero_contrato }}' ">

    <x-contratos.form-edit :action="route('contratos.update', $contrato->id) " :contrato="$contrato"/>

</x-layout>