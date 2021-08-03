$arrays = [
            [0,0],
            [0,1],
            [1,0],
            [1,1],
            [1, 1, 0, 1, 1],
            [1, 1, 0, 1, 1, 0, 1, 1, 1],
            [1, 1, 0, 1, 1, 0, 1, 1, 1, 0],
            [1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1],
            [1, 1, 1, 1, 1],
           ];
foreach ($arrays as $array) {
    $result = maxOnesAfterRemoveItem($array);
    echo $result . "\r\n";
}
/**
 * Перебираем каждый элемент:
 * если встречаем 1 
 *          и мы еще не удаляли элемент, то суммируем 1 в result1,
 *          если уже удаляли, то складываем в result2,
 * если встречаем 0
 *          и мы еще не удаляли элемент, то удаляем этот 0,
 *          если уже удаляли, то сравниваем с итоговым $result сумму $result1 и $result2, 
 *          если полученное значение, то приравниваем $result.
 *          result2 кладем в result1, result2 обнуляем.
 * Так проходим до конца массива, если так и не удалили никакой 0, то в конце из результата вычитаем 1.
 * 
 */
function maxOnesAfterRemoveItem(array $array): int {
    $deleted = false;
    $result = 0;
    $result1 = 0;
    $result2 = 0;
    foreach ($array as $value) {
        if ($value === 1 && !$deleted) {
           $result1++;
        } elseif ($value === 1 && $deleted) {
           $result2++;
        } elseif($value === 0 && !$deleted) {
           $deleted = true;
        } elseif($value === 0 && $deleted) {
            if ($result1 + $result2 > $result) {
                $result = $result1 + $result2;
            }
           $result1 = $result2;
           $result2 = 0;
        }
    } 
    $result3 = $result1 + $result2;
    if (!$deleted) {
        $result3--;
    }
    if ($result3 > $result) {
       $result = $result3;
    }
    
    return $result;
}
