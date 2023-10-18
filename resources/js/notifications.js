


switch(STATUS_NOTIFICATION)  {
    case null:
        $.notify('Seja bem vindo ao dashboard de produtos', 'neutral');
        break;
    case 'PRODUCT-CREATED-SUCCESS':
        $.notify('Produto criado com sucesso!', 'success');
        break;   
    case 'PRODUCT-UPDATED-SUCCESS':
        $.notify('Produto atualizado com sucesso!', 'success');
        break;   
    case 'PRODUCT-DELETED-SUCCESS':
        $.notify('Produto deletado com sucesso!', 'success');
        break;   
}
