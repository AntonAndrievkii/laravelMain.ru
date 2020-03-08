/** Подтверждение удаления Заказа */
$('.delete').click(function () {
    var res = confirm('Подтвердите действия!');
    if (!res) return false;
});

/** Редактирование Заказа */
$('.redact').click(function () {
    var res = confirm('Вы можете изменить только Комментарий!');
    return false;
});

/** Подтверждение удаления Заказа из БД */
$('.deletebd').click(function () {
    var res = confirm('Подтвердите действия!');
    if (res){
        var ress = confirm('ВЫ УДАЛИТЕ ЗАКАЗ ИЗ БД!')
        if(!ress) return false;
    }
    if (!res) return false;
});
