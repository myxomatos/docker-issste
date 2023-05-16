<table>
    <thead>
    <tr>
        <th>Nombre de la Incidencia</th>
        <th>Descripcion Actividad</th>
        <th>Descripcion Subctividad</th>
    </tr>
    </thead>
    <tbody>
    @foreach($actividades as $invoice)
        <tr>
            <td>{{ $invoice->nombre }}</td>
            <td>{{ $invoice->descripcion_actividad }}</td>
            <td>{{ $invoice->descripcion_subactividad }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
