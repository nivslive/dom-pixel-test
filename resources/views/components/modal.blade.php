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


<!-- ERRORS -->
@if($errors->any())
    {!! implode('', $errors->all('<div class="text-white">:message</div>')) !!}
@endif

@if($type === 'create')

    <div class="p-5 rounded modal-product-create" style="display: none">
        <div class="flex justify-between items-center">
            <h1 class="text-[15px] text-black fw-bold"> CRIAR PRODUTO</h1>
            <button class="text-[20px] text-black fw-bold" onclick="closeCreateModal()"> x </button>
        </div>
        <form class="flex flex-col p-5" method="POST" action="products">
            @csrf
            <label>Nome</label>
            <input type="text" name="name" placeholder="Digite aqui">
            <label>Descrição</label>
            <input type="text" name="description" placeholder="Digite aqui">
            <label>Preço</label>
            <input type="text" class="numerics_values" name="price" placeholder="Digite aqui">
            <label>Quantidade</label>
            <input type="text" class="numerics_values" name="amount" placeholder="Digite aqui">
            <input class="btn pointer" type="submit" placeholder="Criar">
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
            <label>Nome</label>
            <input type="text" name="name" value="{{$product->name}}" placeholder="Digite aqui">
            <label>Descrição</label>
            <input type="text" name="description" value="{{$product->description}}" placeholder="Digite aqui">
            <label>Preço</label>
            <input type="text" name="price" class="numerics_values" value="{{$product->price}}" placeholder="Digite aqui">
            <label>Quantidade</label>
            <input type="text" name="amount" class="numerics_values"  value="{{$product->amount}}" placeholder="Digite aqui">
            <input class="btn pointer" type="submit" placeholder="Editar">
        </form>
    </div>
@endif


