## Тестовое задание
Нужно разработать и реализовать API для датчиков и SPA-приложения.
Приложение позволяет получать данные мониторинга по нескольким параметрам и просматривать историю изменений этих параметров. Параметры мониторинга: температура (в градусах Цельсия), давление (в мегапаскалях), скорость вращения (в оборотах в минуту).
<img src="https://cki42.gitlab.yandexcloud.net/hr/vacancy-web/-/raw/main/img/backend2024.svg">

Данные от датчиков приходят по HTTP в строках вида "<параметр>=<значение>", один запрос на единицу данных, (примеры: T=20, P=304.5, v=3053). Датчикам можно задавать URL на который отправляются запросы.
Приложение будет показывать график изменения параметра за определённый интервал времени, API должно давать такую возможность.
 - Решение должно быть выполнено на фреймворке Laravel;
 - Решение должно сопровождаться README-файлом, достаточным для передачи проекта другому разработчику на доработку и девопсу для организации эксплуатации в боевом окружении;
 - Решение должно быть размещено на любом публично-доступном git-хостинге.
## Для последующих разработчиков
Принцип работы:
     Данные с датчиков принимаются в виде post запроса, для каждого датчика свой запрос, входные переменные T,P и v соответственно обрабатываются своими Request классами.
Основная логика представлена в SensorController с использованием ParamService, в этих классах отдаются все показатели со всех датчиков по 1 из 3 фильтров(last_hour,last_day,last_month),
в удобном для построения графиков виде с помощью Resource классов(в папке graphResources). Также присутствует небольшая валидация значений для фильтра(проверка на дурака)
Рекомендации на доработку: 
- Если за час приходит более одного значения с одного датчика, сделать из n-количества значений одно со средним арифметичсеким показателем
- Доделать валидацию до необходимого варианта

