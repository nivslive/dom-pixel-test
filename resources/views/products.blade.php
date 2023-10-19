@extends('layouts.default')
@section('content')


<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="flex flex-col overflow-x-auto text-white">
            <h1 class="text-[90px] text-white text-center fw-bold"> Catalogo de Produtos</h1>

            <!-- ERRORS -->
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-white">:message</div>')) !!}
            @endif

            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    


                    <!-- CREATE MODAL -->
                    @include('components.modal', ['type' => 'create'])
                    <button class="rounded bg-black text-white p-3" onclick="openCreateModal()"> 
                        CRIAR PRODUTO 
                    </button>
                    <!-- END EDIT MODAL -->



                    <div class="overflow-x-auto flex justify-center items-center">
                      <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Nome</th>
                            <th scope="col" class="px-6 py-4">Descrição</th>
                            <th scope="col" class="px-6 py-4">Preço</th>
                            <th scope="col" class="px-6 py-4">Quantidade</th>
                            <th scope="col" class="px-6 py-4">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)

                        <!-- EDIT MODAL -->
                        @include('components.modal', ['product', $product, 'type' => 'edit'])
                        <!-- END EDIT MODAL -->

                          <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$product->id}}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $product->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $product->description }}</td>
                            <td class="whitespace-nowrap px-6 py-4">R$ {{number_format($product->price, 2, ',', '')  }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $product->amount }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <button onclick="openEditModal({{$product->id}})">Editar</button>
                                <button onclick="deleteProduct({{$product->id}})">Deletar</button>
                            </td>
                            
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection

@push('js')
<script>
    // SEE RULES ABOUT THIS IN RESOURCES/JS/NOTIFICATIONS.JS
    const STATUS_NOTIFICATION = @if(session('status')) '{{ session('status')['type'] }}' @else null @endif
</script>
@endpush


@push('js')
<script>
    // CREATE MODAL FUNCTIONS    
    function openCreateModal() {
        // console.log(id)
        const modal = document.querySelector(`.modal-product-create`)
        modal.style.display = 'flex'
    }

    function closeCreateModal() {
        const modal = document.querySelector(`.modal-product-create`)
        modal.style.display = 'none'
    }


    //EDIT MODAL FUNCTIONS
    function openEditModal(id) {
        // console.log(id)
        const modal = document.querySelector(`.modal-product-edit-${id}`)
        modal.style.display = 'flex'
    }

    function closeEditModal(id) {
        const modal = document.querySelector(`.modal-product-edit-${id}`)
        modal.style.display = 'none'
    }



    // DELETE FUNCTIONS
    function deleteProduct(id) {
        if (confirm("Tem certeza de que deseja excluir este produto?")) {
            fetch(`/products/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                console.log(response)
                if (response.ok) {
                    window.location.reload();
                } else {
                    $.notify('Falha ao excluir o produto.', 'error');
                }
            })
            .catch(error => {
                $.notify('Erro na solicitação de exclusão: ', error);
            });
        }
    }

</script>
@endpush