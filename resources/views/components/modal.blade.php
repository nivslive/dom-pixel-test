@push('css')
    <style>
    .modal-product-edit, .modal-product-create {
        position: absolute; 
        color: black; 
        background: white; 
        flex-direction: column;
    }

    .modal-product-edit {
        display: none;
    }
    </style>
@endpush



@if($type === 'create')
    <div class="p-5 rounded modal-product-create" style="display: none">
        <div class="flex justify-between items-center">
            <h1 class="text-[15px] text-black fw-bold"> CRIAR PRODUTO</h1>
            <button class="text-[20px] text-black fw-bold" onclick="closeCreateModal()"> x </button>
        </div>
        <form class="flex flex-col p-5" method="POST" action="products">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                  Nome
                </label>
                <input class="shadow appearance-none border border-blue-500 
                rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight 
                focus:outline-none focus:shadow-outline" id="name" type="name" placeholder="Digite aqui">
                <p class="text-blue-500 text-xs italic"></p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                  Descrição
                </label>
                <input class="shadow appearance-none border border-blue-500 rounded w-full 
                py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                " id="description" type="description" placeholder="Digite aqui">
                <p class="text-blue-500 text-xs italic"></p>
            </div>



            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                  Preço
                </label>
                <input class="shadow appearance-none border border-blue-500 rounded w-full 
                py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                numerics_values" id="price" type="price" placeholder="Digite aqui">
                <p class="text-blue-500 text-xs italic"></p>
            </div>


            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">
                  Quantidade
                </label>
                <input class="shadow appearance-none border border-blue-500 rounded w-full 
                py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                numerics_values" id="amount" type="amount" placeholder="Digite aqui">
                <p class="text-blue-500 text-xs italic"></p>
            </div>


            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" placeholder="Criar">
        </form>
    </div>

@elseif($type === 'edit')
    <div class="p-5 rounded modal-product-edit modal-product-edit-{{$product->id}}">
        <div class="flex justify-between items-center">
            <h1 class="text-[15px] text-black fw-bold"> EDITAR PRODUTO</h1>
            <button class="text-[20px] text-black fw-bold" onclick="closeEditModal({{$product->id}})"> x </button>
        </div>
        <form class="flex flex-col p-5" method="POST" action="products/{{$product->id}}">
            @method('PUT')
            @csrf
        
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                  Nome
                </label>
                <input class="shadow appearance-none border border-blue-500 
                rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight 
                focus:outline-none focus:shadow-outline" id="name" value="{{$product->name}}" type="name" placeholder="Digite aqui">
                <p class="text-blue-500 text-xs italic"></p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                  Descrição
                </label>
                <input class="shadow appearance-none border border-blue-500 rounded w-full 
                py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                " id="description" type="description" value="{{$product->description}}" placeholder="Digite aqui">
                <p class="text-blue-500 text-xs italic"></p>
            </div>



            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                  Preço
                </label>
                <input class="shadow appearance-none border border-blue-500 rounded w-full 
                py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                numerics_values" id="price" type="price" value="{{$product->price}}" placeholder="Digite aqui">
                <p class="text-blue-500 text-xs italic"></p>
            </div>


            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">
                  Quantidade
                </label>
                <input class="shadow appearance-none border border-blue-500 rounded w-full 
                py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline
                numerics_values" id="amount" type="amount" value="{{$product->amount}}" placeholder="Digite aqui">
                <p class="text-blue-500 text-xs italic"></p>
            </div>


            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" placeholder="Editar">
        
        </form>
    </div>
@endif


