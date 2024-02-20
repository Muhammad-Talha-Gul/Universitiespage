<table class="table table-responsive">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th class="text-success">Accept</th>
            <th class="text-warning">Cancel</th>
            <th class="text-danger">Reject</th>
            <th class="text-danger"></th>
        </tr>
    </thead>
    <tbody id="receivedItems">
        @include('ajax.received_items')
    </tbody>
</table>