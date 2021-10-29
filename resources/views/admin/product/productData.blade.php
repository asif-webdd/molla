<table class="table table-striped table-bordered table-hover dataTables-example"
       data-page-size="15">
    <thead>
    <tr>

        <th data-toggle="true"
            class="footable-visible footable-first-column footable-sortable footable-sorted">
            SL<span class="footable-sort-indicator"></span></th>
        <th data-toggle="true"
            class="footable-visible footable-first-column footable-sortable footable-sorted">
            Product Name<span class="footable-sort-indicator"></span></th>
        <th data-hide="phone" class="footable-visible footable-sortable">Image<span
                class="footable-sort-indicator"></span></th>
        <th data-hide="all" class="footable-sortable" style="display: none;">
            Description<span class="footable-sort-indicator"></span></th>
        <th data-hide="phone" class="footable-visible footable-sortable">Price<span
                class="footable-sort-indicator"></span></th>
        <th data-hide="phone,tablet" class="footable-visible footable-sortable">
            Quantity<span class="footable-sort-indicator"></span></th>
        <th data-hide="phone" class="footable-visible footable-sortable">Featured?<span
                class="footable-sort-indicator"></span></th>
        <th data-hide="phone" class="footable-visible footable-sortable">Status<span
                class="footable-sort-indicator"></span></th>
        <th class="text-right footable-visible footable-last-column"
            data-sort-ignore="true">Action
        </th>

    </tr>
    </thead>
    <tbody>

    @foreach($data as $product)
        <tr class="footable-even" style="">
            <td class="footable-visible footable-first-column"><span
                    class="footable-toggle"></span>
                {{ $loop->index + $data->firstItem() }}
            </td>
            <td class="footable-visible footable-first-column"><span
                    class="footable-toggle"></span>
                {{ $product->name }}
            </td>
            <td class="footable-visible"><img src="{{ $product->thumbnail }}" width="50px"
                                              alt=""></td>
            <td style="display: none;">
                {{ $product->description }}
            </td>
            <td class="footable-visible">
                {{ $product->price }}-{{ $product->offer_price }}
            </td>
            <td class="footable-visible">
                {{ $product->quantity }}
            </td>
            <td class="footable-visible">
                <span class="label label-primary">{{ $product->featured }}</span>
            </td>
            <td class="footable-visible">
                <span class="label label-primary">{{ $product->status }}</span>
            </td>
            <td class="text-right footable-visible footable-last-column">
                <div class="btn-group">
                    <button class="btn-primary btn btn-xs">View</button>
                    <button class="btn-dark btn btn-xs">Edit</button>
                    <button class="btn-danger btn btn-xs">Delete</button>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
    <tfoot>
    {{ $data->links() }}
    </tfoot>
</table>
