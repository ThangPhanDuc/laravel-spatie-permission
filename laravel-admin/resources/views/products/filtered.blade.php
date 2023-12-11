@foreach ($products as $product)
<tr>
    <td>
        {{ $product->id }}
    </td>
    <td>
        <a>
            {{ $product->name }}
        </a>
        <br />
        <small>
            Created 01.01.2019
        </small>
    </td>
    <td>
        {{ $product->code }}
    </td>
    <td>
        {{ $product->unit_price }}
    </td>
    <td>
        {{ $product->discount }}
    </td>
    <td>
        {{ $product->final_price }}
    </td>
    <td>
        {{ $product->category->name }}
    </td>
    <td>
        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 60px; max-height: 600px;">
    </td>
    <td class="project-actions text-center">
        <div class="btn-group">
            <a class="btn btn-primary btn-sm mx-1" href="{{ route('products.show', $product) }}">
                <i class="fas fa-folder"></i> View
            </a>
            @can('edit_products')
            <a class="btn btn-info btn-sm mx-1" href="{{ route('products.edit', $product) }}">
                <i class="fas fa-pencil-alt"></i> Edit
            </a>
            @endcan
            @can('delete_products')
            <form method="post" action="{{ route('products.destroy', $product->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure you want to delete this product?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
            @endcan
        </div>
    </td>
</tr>
@endforeach