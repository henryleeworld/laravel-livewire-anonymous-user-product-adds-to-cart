<table class="table min-w-full">
    <thead>
    <tr>
        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">{{ trans('frontend.product.content.name') }}</th>
        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">{{ trans('frontend.product.content.price') }}</th>
        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider"></th>
    </tr>
    </thead>
    <tbody>
    @forelse ($products as $product)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                {{ $product->name }}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                ${{ number_format($product->price / 100, 2) }}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                @if ($cart->where('id', $product->id)->count())
                    <!--<button class="inline-flex items-center px-4 py-2 bg-red-600 text-white border border-transparent rounded-md" wire:click="delete('{{ $cart->where('id', $product->id)->first()->rowId }}')" onclick="confirm('{{ trans('frontend.product.content.are_you_sure') }}') || event.stopImmediatePropagation()">
                            {{ trans('frontend.product.content.delete') }}
                    </button>-->
				    <!--<button class="inline-flex items-center px-4 py-2 bg-red-600 text-white border border-transparent rounded-md" wire:click="delete('{{ $cart->where('id', $product->id)->first()->rowId }}')" wire:confirm="{{ trans('frontend.product.content.are_you_sure') }}">
                            {{ trans('frontend.product.content.delete') }}
                    </button>-->
				    <button class="inline-flex items-center px-4 py-2 bg-red-600 text-white border border-transparent rounded-md" wire:click="delete('{{ $cart->where('id', $product->id)->first()->rowId }}')" wire:confirm.prompt="{{ trans('frontend.product.content.are_you_sure_type_to_confirm', ['product_name' => $product->name]) }} |{{ $product->name }}">
                            {{ trans('frontend.product.content.delete') }}
                    </button>
                @else
                    <form wire:submit.prevent="addToCart({{ $product->id }})" action="" method="POST">
                        @csrf
                        <input wire:model.live="quantity.{{ $product->id }}" type="number"
                               class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                               style="width: 50px"/>
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ trans('frontend.product.content.add_to_cart') }}
                        </button>
                    </form>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5" colspan="3">
                {{ trans('frontend.product.content.no_products_found') }}
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
