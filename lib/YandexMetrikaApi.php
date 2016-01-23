<?php
/*The MIT License (MIT)

Copyright (c) 2014 webjeyros(webjeyros@gmail.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.*/
class YandexMetrikaApi {
	public $access_token;
	public $error_code = array("ERR_NO_SUCH_METHOD" => "Метод не существует.", "ERR_PARAM_REQUIRED" => "Требуется параметр.", "ERR_READ_ONLY" => "Операции добавления и редактирования счетчика временно недоступны. Попробуйте повторить операцию позже.", "ERR_EMAIL" => "Неверно указан адрес E-mail.", "ERR_EMAIL_EMPTY" => "Не указан адрес E-mail.", "ERR_MIRROR" => "Неверно указано зеркало для сайта.", "ERR_MIRROR_EXISTS" => "Для данного сайта уже существует счетчик. Укажите другое наименование.", "ERR_SITE" => "Неверно указан сайт.", "ERR_SITE_EXISTS" => "Для данного сайта уже существует счетчик. Укажите другое наименование.", "ERR_SITE_NAME" => "Не указано наименование счетчика или сайт.", "ERR_SITE_NAME_EXISTS" => "Счетчик с таким наименованием уже существует.", "ERR_CODE_INFORMER_COLOR_ARROW" => "Неверно указан цвет стрелки информера.", "ERR_CODE_INFORMER_COLOR_END" => "Неверно указан конечный цвет градиента информера.", "ERR_CODE_INFORMER_COLOR_START" => "Неверно указан начальный цвет градиента информера.", "ERR_CODE_INFORMER_COLOR_TEXT" => "Неверно указан цвет текста информера.", "ERR_CODE_INFORMER_INDICATOR" => "Неверно указан индикатор информера.", "ERR_CODE_INFORMER_SIZE" => "Неверно указан тип размера информера.", "ERR_CODE_INFORMER_TYPE" => "Неверно указан тип кода информера.", "ERR_GOAL_CONDITIONS_EMPTY" => "Не указаны условия для цели.", "ERR_GOAL_CONDITIONS_LIMIT" => "Превышен лимит условий для цели.", "ERR_GOAL_CONDITION_TYPE" => "Неверно указан тип цели.", "ERR_GOAL_CONDITION_TYPE_EMPTY" => "Не указан тип цели.", "ERR_GOAL_CONDITION_URL" => "Неверно указан URL цели.", "ERR_GOAL_CONDITION_URL_EMPTY" => "Не указан URL цели.", "ERR_GOAL_DEPTH" => "Неверно указано число просмотренных страниц.", "ERR_GOAL_DEPTH_EMPTY" => "Не указано число просмотренных страниц.", "ERR_GOAL_DUPLICATED" => "Дубликат ранее заданной цели.", "ERR_GOAL_FLAG" => "Неверно указан тип цели интернет магазина.", "ERR_GOAL_FLAG_LIMIT" => "Для одного счетчика можно указать только 1 заказ и 1 корзину.", "ERR_GOAL_NAME_EMPTY" => "Не указано название цели.", "ERR_GOAL_TYPE" => "Неверно указан тип цели.", "ERR_GOAL_TYPE_EMPTY" => "Не указан тип цели.", "ERR_GOALS_LIMIT" => "Превышен лимит целей.", "ERR_FILTER_ACTION" => "Неверно указан тип фильтра.", "ERR_FILTER_ACTION_EMPTY" => "Не указан тип фильтра.", "ERR_FILTER_ATTR" => "Неверно указано поле фильтра.", "ERR_FILTER_ATTR_EMPTY" => "Не указано поле фильтра.", "ERR_FILTER_IP" => "IP-адрес или диапазон указан в неверном формате.", "ERR_FILTER_IP_TYPE" => "Для фильтра «IP» неверно указано отношение.", "ERR_FILTER_IP_EQUAL" => "Укажите только один IP-адрес.", "ERR_FILTER_MIRRORS_ACTION" => "Для зеркал тип фильтра указан неверно.", "ERR_FILTER_REF_TYPE" => "Для фильтра «Реферер» неверно указано отношение.", "ERR_FILTER_STATUS" => "Неверно указан статус фильтра.", "ERR_FILTER_TITLE_TYPE" => "Для фильтра «Заголовок» неверно указано отношение.", "ERR_FILTER_TYPE" => "Неверно указано условие для фильтра.", "ERR_FILTER_TYPE_EMPTY" => "Не указано условие для фильтра.", "ERR_FILTER_UNIQ_ID_ACTION" => "Для фильтра «Не учитывать меня» тип фильтра указан неверно.", "ERR_FILTER_URL_TYPE" => "Для фильтра «URL страницы» неверно указано отношение.", "ERR_FILTER_VALUE_EMPTY" => "Не указано значение фильтра.", "ERR_FILTERS_LIMIT" => "Превышен лимит фильтров.", "ERR_OPERATION_ACTION" => "Неверно указан тип операции.", "ERR_OPERATION_ACTION_EMPTY" => "Не указан тип операции.", "ERR_OPERATION_ATTR" => "Неверно указано поле операции.", "ERR_OPERATION_ATTR_EMPTY" => "Не указано поле операции.", "ERR_OPERATION_STATUS" => "Неверно указан статус операции.", "ERR_OPERATION_VALUE_EMPTY" => "Не указано значение операции.", "ERR_OPERATIONS_LIMIT" => "Превышен лимит операций.", "ERR_DELEGATE_LOGIN_MYSELF" => "Нельзя указывать свой логин.", "ERR_DELEGATE_LOGIN_NOT_EXISTS" => "Такой пользователь не существует.", "ERR_DELEGATES_LIMIT" => "Превышен лимит представителей.", "ERR_GRANT_LOGIN_MYSELF" => "Нельзя указывать свой логин.", "ERR_GRANT_LOGIN_NOT_EXISTS" => "Такой пользователь не существует.", "ERR_GRANT_PERM" => "Неверно заданы права.", "ERR_GRANTS_LIMIT" => "Превышен лимит прав доступа.", "ERR_DATE_BEGIN" => "Неверно указана дата начала периода.", "ERR_DATE_DELTA" => "Дата конца периода должна быть не меньше даты начала.", "ERR_DATE_END" => "Неверно указана дата конца периода.", "ERR_NO_DATA" => "Нет данных за выбранный период.");
	public $filter_statuses = array("CS_ERR_CONNECT" => "Не удалось проверить (ошибка соединения).", "CS_ERR_DUPLICATED" => "Установлен более одного раза.", "CS_ERR_HTML_CODE" => "Установлен некорректно.", "CS_ERR_OTHER_HTML_CODE" => "Уже установлен другой счетчик.", "CS_ERR_TIMEOUT" => "Не удалось проверить (превышено время ожидания).", "CS_ERR_UNKNOWN" => "Неизвестная ошибка.", "CS_NEW_COUNTER" => " Недавно создан.", "CS_NA" => "Не применим к данному счетчику.", "CS_NOT_EVERYWHERE" => "Установлен не на всех страницах.", "CS_NOT_FOUND" => "Не установлен.", "CS_NOT_FOUND_HOME" => "Не установлен на главной странице.", "CS_NOT_FOUND_HOME_LOAD_DATA" => "Не установлен на главной странице, но данные поступают.", "CS_OBSOLETE" => "Установлена устаревшая версия кода счетчика.", "CS_OK" => "Корректно установлен.", "CS_OK_NO_DATA" => "Установлен, но данные не поступают.", "CS_WAIT_FOR_CHECKING" => "Ожидает проверки наличия.", "CS_WAIT_FOR_CHECKING_LOAD_DATA" => "Ожидает проверки наличия, данные поступают.");

	public function __construct($access_token) {
		$this -> access_token = $access_token;
	}

	/**
	 * Возвращает json_decode ответ от метрики
	 * @param string $method  Тип_метода ― GET, POST, PUT или DELETE.
	 * @param string $path    Имя_метода ― URL ресурса, над которым выполняется действие.
	 * @param array  $options Параметры ― Обязательные и необязательные параметры запроса, которые не входят в состав URL ресурса.
	 */
	private function QueryYandex($method = "get", $path = "/counters", $options = array()) {
		if ($method === "get") {
			foreach ($options as $key => $value)
				$opt .= "{$key}={$value}&";
			$ret = Unirest\Request::get("http://api-metrika.yandex.ru" . $path . ".json?pretty=1&{$opt}", array("Content-Type" => "application/x-yametrika+json", "Authorization" => "OAuth " . $this -> access_token, "Accept" => "application/x-yametrika+json"));

		} else {
			$ret = Unirest\Request::$method("http://api-metrika.yandex.ru" . $path . ".json?pretty=1", array("Content-Type" => "application/x-yametrika+json", "Authorization" => "OAuth " . $this -> access_token, "Accept" => "application/x-yametrika+json", json_encode($options)));
		}
		if ($ret -> code != 200) :
			throw new Exception("Error" . $ret -> body);
		elseif (json_decode($ret -> raw_body) -> errors) :
			throw new Exception("Method error");
		else :
			return json_decode($ret -> raw_body);
		endif;
	}

	/**
	 * Возвращает список существующих счетчиков, доступных пользователю.
	 * @param string $type       Фильтр выходных данных по типу счетчика.
	 * @param string $permission Фильтр выходных данных по уровню доступа к счетчику.
	 * @param string $ulogin     Логин пользователя, доверившего управление своими счетчиками пользователю, от имени которого выполняется запрос.
	 * @param string $field      Один или несколько дополнительных параметров возвращаемого объекта.
	 */
	public function ListCounters($type = null, $permission = null, $ulogin = null, $field = null) {
		return $this -> QueryYandex("get", "/counters", array("type" => $type, "permission" => $permission, "ulogin" => $ulogin, "field" => $field));
	}

	/**
	 * Возвращает информацию об указанном счетчике.
	 * @param integer $id    Идентификатор счетчика.
	 * @param string  $field Один или несколько дополнительных параметров возвращаемого объекта.
	 */
	public function InfoCounter($id, $field = null) {
		return $this -> QueryYandex("get", "/counter/{$id}", array("field" => $field));
	}

	/**
	 * Создает счетчик с заданными параметрами.
	 * @param string $name         Наименование сайта (произвольная строка).
	 * @param string $site         Полный домен сайта.
	 * @param array  $code_options Настройки кода счетчика.
	 * @param array  $mirrors      Список зеркал (доменов) сайта.
	 * @param array  $goals        Список структур с информацией о целях счетчика.
	 * @param array  $filters      Список структур с информацией о фильтрах счетчика.
	 * @param array  $operations   Список структур с информацией об операциях счетчика.
	 * @param array  $grants       Список структур с информацией о правах доступа к счетчику.
	 * @param array  $monitoring   Настройки мониторинга доступности сайта.
	 * @param string $field        Один или несколько дополнительных параметров возвращаемого объекта.
	 */
	public function AddCounter($name, $site, $code_options = null, $mirrors = null, $goals = null, $filters = null, $operations = null, $grants = null, $monitoring = null, $field = null) {
		return $this -> QueryYandex("post", "/counters", array("name" => $name, "site" => $site, "code_options" => $code_options, "mirrors" => $mirrors, "goals" => $goals, "filters" => $filters, "operations" => $operations, "grants" => $grants, "monitoring" => $monitoring, "field" => $field));
	}

	/**
	 * Изменяет данные для указанного счетчика.
	 * @param integer $id                Идентификатор счетчика.
	 * @param string  $name              Наименование сайта (произвольная строка).
	 * @param string  $site              Полный домен сайта.
	 * @param array   $code_options      Настройки кода счетчика.
	 * @param array   $mirrors           Список зеркал (доменов) сайта.
	 * @param array   $goals             Список структур с информацией о целях счетчика.
	 * @param array   $filters           Список структур с информацией о фильтрах счетчика.
	 * @param array   $operations        Список структур с информацией об операциях счетчика.
	 * @param array   $grants            Список структур с информацией о правах доступа к счетчику.
	 * @param array   $monitoring        Настройки мониторинга доступности сайта.
	 * @param integer $mirrors_remove    Зеркала удалять / не удалять
	 * @param integer $goals_remove      Цели  удалять / не удалять
	 * @param integer $filters_remove    Фильтры удалять / не удалять
	 * @param integer $operations_remove Операции удалять / не удалять
	 * @param integer $grants_remove     Настройки доступа удалять / не удалять
	 * @param string  $field             Один или несколько дополнительных параметров возвращаемого объекта.
	 */
	public function ChangeCounter($id, $name, $site, $code_options = null, $mirrors = null, $goals = null, $filters = null, $operations = null, $grants = null, $monitoring = null, $mirrors_remove = null, $goals_remove = null, $filters_remove = null, $operations_remove = null, $grants_remove = null, $field = null) {
		return $this -> QueryYandex("put", "/counter/{$id}", array("name" => $name, "site" => $site, "code_options" => $code_options, "mirrors" => $mirrors, "goals" => $goals, "filters" => $filters, "operations" => $operations, "grants" => $grants, "monitoring" => $monitoring, "mirrors_remove" => $mirrors_remove, "goals_remove" => $goals_remove, "filters_remove" => $filters_remove, "operations_remove" => $operations_remove, "grants_remove" => $grants_remove, "field" => $field));
	}

	/**
	 * Удаляет указанный счетчик.
	 * @param integer $id Идентификатор счетчика.
	 */
	public function DeleteCounter($id) {
		return $this -> QueryYandex("delete", "/counter/{$id}");
	}

	/**
	 * Обновляет статус установки кода счетчика на основной странице сайта.
	 * @param integer $id Идентификатор счетчика.
	 */
	public function CheckCounterCode($id) {
		return $this -> QueryYandex("get", "/counter/{$id}/check");
	}

	/**
	 * Возвращает информацию о целях счетчика.
	 * @param integer $id Идентификатор счетчика.
	 */
	public function ListGoals($id) {
		return $this -> QueryYandex("get", "/counter/{$id}/goals");
	}

	/**
	 * Возвращает информацию об указанной цели счетчика.
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика.
	 */
	public function InfoGoal($id, $goal_id) {
		return $this -> QueryYandex("get", "/counter/{$id}/goal/{$goal_id}");
	}

	/**
	 * Создает цель счетчика.
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $name       Наименование цели.
	 * @param integer $class      Класс.
	 * @param string  $type       Тип цели.
	 * @param string  $flag       Тип цели для клиентов Яндекс.Маркета.
	 * @param array   $conditions Список структур с условиями цели.
	 * @param integer $depth      Количество просмотренных пользователем страниц.
	 */
	public function AddGoal($id, $name, $class = null, $type = null, $flag = null, $conditions = null, $depth = null) {
		return $this -> QueryYandex("post", "/counter/{$id}/goals", array("goal" => array("name" => $name, "class" => $class, "type" => $type, "flag" => $flag, "conditions" => $conditions, "depth" => $depth)));
	}

	/**
	 * Изменяет настройки указанной цели счетчика.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика.
	 * @param string  $name       Наименование цели.
	 * @param integer $class      Класс.
	 * @param string  $type       Тип цели.
	 * @param string  $flag       Тип цели для клиентов Яндекс.Маркета.
	 * @param array   $conditions Cписок структур с условиями цели.
	 * @param integer $depth      Количество просмотренных пользователем страниц.
	 */
	public function ChangeGoal($id, $goal_id, $name = null, $class = null, $type = null, $flag = null, $conditions = null, $depth = null) {
		return $this -> QueryYandex("put", "/counter/{$id}/goal/{$goal_id}", array("goal" => array("name" => $name, "class" => $class, "type" => $type, "flag" => $flag, "conditions" => $conditions, "depth" => $depth)));
	}

	/**
	 * Удаляет цель счетчика.
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика.
	 */
	public function DeleteGoal($id, $goal_id) {
		return $this -> QueryYandex("delete", "/counter/{$id}/goal/{$goal_id}");
	}

	/**
	 * Возвращает информацию о фильтрах счетчика.
	 * @param integer $id Идентификатор счетчика.
	 */
	public function ListFilters($id) {
		return $this -> QueryYandex("get", "/counter/{$id}/filters");
	}

	/**
	 * Возвращает информацию об указанном фильтре счетчика.
	 * @param integer $id        Идентификатор счетчика.
	 * @param integer $filter_id Идентификатор фильтра счетчика.
	 */
	public function InfoFilter($id, $filter_id) {
		return $this -> QueryYandex("get", "/counter/{$id}/filter/{$filter_id}");
	}

	/**
	 * Создает фильтр счетчика.
	 * @param integer $id     Идентификатор счетчика.
	 * @param string  $action Тип фильтра.
	 * @param string  $attr   Тип данных, к которым применяется фильтр.
	 * @param string  $type   Отношение или действие для фильтра.
	 * @param string  $value  Значение фильтра.
	 * @param string  $status Статус фильтра.
	 */
	public function AddFilter($id, $action = null, $attr = null, $type = null, $value = null, $status = null) {
		return $this -> QueryYandex("post", "/counter/{$id}/filters", array("filter" => array("action" => $action, "attr" => $attr, "type" => $type, "value" => $value, "status" => $status)));
	}

	/**
	 * Изменяет настройки указанного фильтра счетчика.
	 * @param integer $id        Идентификатор счетчика.
	 * @param integer $filter_id Идентификатор фильтра счетчика.
	 * @param string  $action    Тип фильтра.
	 * @param string  $attr      Тип данных, к которым применяется фильтр.
	 * @param string  $type      Отношение или действие для фильтра.
	 * @param string  $value     Значение фильтра.
	 * @param string  $status    Статус фильтра.
	 */
	public function ChangeFilter($id, $filter_id = null, $action = null, $attr = null, $type = null, $value = null, $status = null) {

		return $this -> QueryYandex("put", "/counter/{$id}/filter/{$filter_id}", array("filter" => array("action" => $action, "attr" => $attr, "type" => $type, "value" => $value, "status" => $status)));
	}

	/**
	 * Удаляет фильтр счетчика.
	 * @param integer $id        Идентификатор счетчика.
	 * @param integer $filter_id Идентификатор фильтра счетчика.
	 */
	public function DeleteFilter($id, $filter_id) {
		return $this -> QueryYandex("delete", "/counter/{$id}/filter/{$filter_id}");
	}

	/**
	 * Возвращает информацию об операциях счетчика.
	 * @param integer $id Идентификатор счетчика.
	 */
	public function ListOperations($id) {
		return $this -> QueryYandex("get", "/counter/{$id}/operations");
	}

	/**
	 * Возвращает информацию об указанной операции счетчика.
	 * @param integer $id           Идентификатор счетчика.
	 * @param integer $operation_id Идентификатор операции счетчика.
	 */
	public function InfoOperation($id, $operation_id) {
		return $this -> QueryYandex("get", "/counter/{$id}/operation/{$operation_id}");
	}

	/**
	 * Создает операцию для счетчика.
	 * @param integer $id     Идентификатор счетчика.
	 * @param string  $action Тип операции.
	 * @param string  $attr   Поле для фильтрации.
	 * @param string  $value  Значение для замены.
	 * @param string  $status Статус операции.
	 */
	public function AddOperation($id, $action = null, $attr = null, $value = null, $status = null) {
		return $this -> QueryYandex("post", "/counter/{$id}/operations", array("operation" => array("action" => $action, "attr" => $attr, "value" => $value, "status" => $status)));
	}

	/**
	 * Изменяет настройки указанной операции счетчика.
	 * @param integer $id           Идентификатор счетчика.
	 * @param [type]  $operation_id Идентификатор операции счетчика.
	 * @param string  $action       Тип операции.
	 * @param string  $attr         Поле для фильтрации.
	 * @param string  $value        Значение для замены.
	 * @param string  $status       Статус операции.
	 */
	public function ChangeOperation($id, $operation_id, $action = null, $attr = null, $value = null, $status = null) {
		return $this -> QueryYandex("put", "/counter/{$id}/operation/{$operation_id}", array("operation" => array("action" => $action, "attr" => $attr, "value" => $value, "status" => $status)));
	}

	/**
	 * Удаляет операцию счетчика.
	 * @param integer $id           Идентификатор счетчика.
	 * @param integer $operation_id Идентификатор операции счетчика.
	 */
	public function DeleteOperation($id, $operation_id) {
		return $this -> QueryYandex("delete", "/counter/{$id}/operation/{$operation_id}");
	}

	/**
	 * Возвращает информацию о разрешениях на управление счетчиком и просмотр статистики .
	 * @param integer $id Идентификатор счетчика.
	 */
	public function ListGrants($id) {
		return $this -> QueryYandex("get", "/counter/{$id}/grants");
	}

	/**
	 * Возвращает информацию об указанном разрешении на управление счетчиком и просмотр статистики.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $user_login Логин пользователя из Яндекс.Паспорта.
	 */
	public function InfoGrant($id, $user_login) {
		return $this -> QueryYandex("get", "/counter/{$id}/grant/{$user_login}");
	}

	/**
	 * Создает разрешения на управление счетчиком и просмотр статистики .
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $perm       Тип доступа.
	 * @param string  $user_login Логин пользователя из Яндекс.Паспорта, которому необходимо выдать разрешение на управление счетчиком.
	 * @param string  $comment    Произвольный комментарий.
	 */
	public function AddGrant($id, $perm, $user_login = null, $comment = null) {
		return $this -> QueryYandex("post", "/counter/{$id}/grants", array("grant" => array("perm" => $perm, "user_login" => $user_login, "comment" => $comment)));
	}

	/**
	 * Изменяет настройки указанного разрешения на управление счетчиком и просмотр статистики.
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $user_login Логин пользователя из Яндекс.Паспорта, для которого необходимо изменить настройки разрешения на управление счетчиком.
	 * @param string  $perm       Тип доступа.
	 * @param string  $comment    Произвольный комментарий.
	 * @param integer $comment_remove Произвольный комментарий Удалять / не удалять.
	 */
	public function ChangeGrant($id, $user_login, $perm = null, $comment = null, $comment_remove = null) {
		return $this -> QueryYandex("put", "/counter/{$id}/grant/{$user_login}", array("grant" => array("perm" => $perm, "comment" => $comment, "comment_remove" => $comment_remove)));
	}

	/**
	 * Удаляет разрешения на управление счетчиком и просмотр статистики .
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $user_login Логин пользователя из Яндекс.Паспорта, для которого необходимо отменить разрешение на управление счетчиком;
	 */
	public function DeleteGrants($id, $user_login) {
		return $this -> QueryYandex("delete", "/counter/{$id}/grant/{$user_login}");
	}

	/**
	 * Возвращает список представителей, которым предоставлен полный доступ к аккаунту текущего пользователя.
	 */
	public function ListDelegates() {
		return $this -> QueryYandex("get", "/delegates");
	}

	/**
	 * Добавляет логин пользователя в список представителей для текущего аккаунта.
	 * @param string $user_login Логин пользователя из Яндекс.Паспорта, которому необходимо предоставить полный доступ к аккаунту текущего пользователя.
	 * @param string $comment    Произвольный комментарий.
	 *
	 */
	public function AddDelegate($user_login, $comment) {
		return $this -> QueryYandex("post", "/delegates", array("user_login" => $user_login, "comment" => $comment));
	}

	/**
	 * Изменяет список представителей для аккаунта текущего пользователя. Список представителей обновляется в соответствии с перечнем логинов во входной структуре.
	 * @param string  $user_login     Логин пользователя из Яндекс.Паспорта, которому необходимо предоставить полный доступ к аккаунту текущего пользователя.
	 * @param string  $comment        Произвольный комментарий.
	 * @param integer $comment_remove Произвольный комментарий Удалять / не удалять.
	 */
	public function ChangeDelegate($user_login, $comment = null, $comment_remove = null) {
		return $this -> QueryYandex("put", "/delegates", array("user_login" => $user_login, "comment" => $comment, "comment_remove" => $comment_remove));
	}

	/**
	 * Удаляет логин пользователя из списка представителей для текущего аккаунта.
	 * @param string $user_login Логин пользователя из Яндекс.Паспорта, для которого необходимо аннулировать полный доступ к аккаунту текущего пользователя.
	 */
	public function DeleteDelegate($user_login) {
		return $this -> QueryYandex("delete", "/delegate/{$user_login}");
	}

	/**
	 * Возвращает список аккаунтов, представителем которых является текущий пользователь.
	 */
	public function ListAccounts() {
		return $this -> QueryYandex("get", "/accounts");
	}

	/**
	 * Изменяет список аккаунтов, представителем которых является текущий пользователь. Список аккаунтов обновляется в соответствии с перечнем логинов во входной структуре.
	 * @param array $accounts Массив структур, содержащих логины пользователей, представителем которых является текущий пользователь.
	 */
	public function ChangeAccount($accounts) {
		return $this -> QueryYandex("put", "/accounts", $accounts);
	}

	/**
	 * Удаляет логин пользователя из списка аккаунтов, представителем которых является текущий пользователь.
	 * @param string $user_login Логин пользователя из Яндекс.Паспорта, которого необходимо удалить из списка аккаунтов для текущего пользователя.
	 */
	public function DeleteAccount($user_login) {
		return $this -> QueryYandex("delete", "/account/{user_login}");
	}

	/**
	 * Возвращает данные о посещаемости сайта.
	 * @param integer $id       Идентификатор счетчика.
	 * @param integer $goal_id  Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1    Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2    Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $group    Группировка данных по времени.
	 * @param integer $per_page Количество элементов на странице выдачи.
	 */
	public function StatTrafficSummary($id, $goal_id, $date1 = null, $date2 = null, $group = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/traffic/summary", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "group" => $group, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о количестве просмотренных страниц и времени, проведенном посетителями на сайте.
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1   Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2   Дата окончания периода выборки в формате YYYYMMDD.
	 */
	public function StatTrafficDeepness($id, $goal_id, $date1 = null, $date2 = null) {
		return $this -> QueryYandex("get", "/stat/traffic/deepness", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, ));
	}

	/**
	 * Возвращает данные о распределении трафика на сайте по времени суток, за каждый часовой период.
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1   Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2   Дата окончания периода выборки в формате YYYYMMDD.
	 */
	public function StatTrafficHourly($id, $goal_id, $date1 = null, $date2 = null) {
		return $this -> QueryYandex("get", "/stat/traffic/hourly", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, ));
	}

	/**
	 * Возвращает максимальное количество запросов (срабатываний счетчика) в секунду и максимальное количество посетителей онлайн за каждый день выбранного периода времени.
	 * @param integer $id       Идентификатор счетчика.
	 * @param string  $date1    Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2    Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $group    Группировка данных по времени.
	 * @param integer $per_page Количество элементов на странице выдачи.
	 */
	public function StatTrafficLoad($id, $date1 = null, $date2 = null, $group = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/traffic/load", array("id" => $id, "date1" => $date1, "date2" => $date2, "group" => $group, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о переходах из всех источников на сайт, где установлен указанный счетчик.
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1   Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2   Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort    Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse Режим сортировки данных.
	 */
	public function StatSourcesSummary($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null) {
		return $this -> QueryYandex("get", "/stat/sources/summary", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse));
	}

	/**
	 * Возвращает данные о переходах с других сайтов на сайт, где установлен указанный счетчик.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatSourcesSites($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/sources/sites", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о переходах из поисковых систем на сайт, где установлен указанный счетчик.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatSourcesSE($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/sources/search_engines", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о поисковых фразах, по которым посетители нашли ссылку на сайт с установленным счетчиком.
	 * @param integer $id       Идентификатор счетчика.
	 * @param integer $goal_id  Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1    Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2    Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort     Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse  Режим сортировки данных.
	 * @param integer $se_id    Идентификатор поисковой системы (значение из справочника Метрики).
	 * @param integer $per_page Количество элементов на странице выдачи.
	 */
	public function StatSourcesPhrases($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $se_id = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/sources/phrases", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "se_id" => $se_id, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о переходах из рекламных систем на сайт, где установлен указанный счетчик.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatSourcesMarketing($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/sources/marketing", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает отчет о рекламных кампаниях Яндекс.Директа, по объявлениям которых посетители переходили на сайт.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatSourcesDirectSummary($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/sources/direct/summary", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает отчет по площадкам, с которых происходили переходы по объявлениям на сайт рекламодателя.
	 * @param integer $id       Идентификатор счетчика.
	 * @param integer $goal_id  Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1    Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2    Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort     Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse  Режим сортировки данных.
	 * @param integer $per_page Количество элементов на странице выдачи.
	 */
	public function StatSourcesDirectPlatforms($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/sources/direct/platforms", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о принадлежности посетителей, перешедших на сайт по объявлениям, к тому или иному географическому региону.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatSourcesDirectRegions($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/sources/direct/regions", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о переходах на сайт по ссылкам, которые содержат любые из четырех наиболее часто используемых меток.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatSourcesTags($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/sources/tags", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает рейтинг посещаемости страниц сайта по убыванию числа просмотров.
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $mirror_id  Признак фильтрации данных по зеркалам сайта.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatContentPopular($id, $mirror_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/content/popular", array("id" => $id, "mirror_id" => $mirror_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о точках входа на сайт (первых страницах визитов).
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $mirror_id  Признак фильтрации данных по зеркалам сайта.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       оле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatContentEntrance($id, $goal_id, $mirror_id = null, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/content/entrance", array("id" => $id, "goal_id" => $goal_id, "mirror_id" => $mirror_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о точках выхода с сайта (последних страницах визитов).
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $mirror_id  Признак фильтрации данных по зеркалам сайта.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatContentExit($id, $mirror_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/content/exit", array("id" => $id, "mirror_id" => $mirror_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает рейтинг посещаемости страниц сайта с указанием их заголовков (из тега title).
	 * @param integer $id       Идентификатор счетчика.
	 * @param string  $date1    Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2    Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort     Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse  Режим сортировки данных.
	 * @param integer $per_page Количество элементов на странице выдачи.
	 */
	public function StatContentTitles($id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/content/titles", array("id" => $id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о параметрах, отмеченных Метрикой в URL посещаемых на сайте страниц.
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatContentUrl_param($id, $date1 = null, $date2 = null, $table_mode = null, $sort = null, $reverse = null, $per_page = null) {

		return $this -> QueryYandex("get", "/stat/content/url_param", array("id" => $id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о пользовательских параметрах, переданных с помощью кода счетчика.
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatContentUser_vars($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/content/user_vars", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о заказах в интернет-магазине, переданных с помощью кода счетчика.
	 * @param integer $id         Идентификатор счетчика.
	 * @param string  $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatContentEcommerce($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/content/ecommerce", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о принадлежности посетителей к географическим регионам. Список регионов может быть сгруппирован по областям, странам и континентам.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatGeo($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/geo", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные раздельно по полу и возрасту посетителей.
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1   Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2   Дата окончания периода выборки в формате YYYYMMDD.
	 */
	public function StatDemographyAge_gender($id, $goal_id, $date1 = null, $date2 = null) {
		return $this -> QueryYandex("get", "/stat/demography/age_gender", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2));
	}

	/**
	 * Возвращает объединенные данные по полу и возрасту.
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1   Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2   Дата окончания периода выборки в формате YYYYMMDD.
	 */
	public function StatDemographyStructure($id, $goal_id, $date1 = null, $date2 = null) {
		return $this -> QueryYandex("get", "/stat/demography/structure", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2));
	}

	/**
	 * Возвращает данные о браузерах посетителей.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatTechBrowsers($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/tech/browsers", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные об операционных системах посетителей сайта.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatTechOs($id, $goal_id, $date1 = null, $date2 = null, $sort, $reverse = null, $table_mode = null, $per_page = null) {

		return $this -> QueryYandex("get", "/stat/tech/os", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о разрешении дисплеев посетителей сайта.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatTechDisplay($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/tech/display", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о посетителях, которые обращаются на сайт с мобильных устройств.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatTechMobile($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/tech/mobile", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о версиях Flash-плагинов на компьютерах посетителей.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatTechFlash($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/tech/flash", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о распределении различных версий плагина Silverlight.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 * @param string  $table_mode Режим отображения результатов запроса.
	 * @param integer $per_page   Количество элементов на странице выдачи.
	 */
	public function StatTechSilverlight($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null, $table_mode = null, $per_page = null) {
		return $this -> QueryYandex("get", "/stat/tech/silverlight", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse, "table_mode" => $table_mode, "per_page" => $per_page));
	}

	/**
	 * Возвращает данные о наличии платформы Java на компьютерах посетителей.
	 * @param integer $id         Идентификатор счетчика.
	 * @param integer $goal_id    Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1      Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2      Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort       Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse    Режим сортировки данных.
	 */
	public function StatTechJava($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null) {

		return $this -> QueryYandex("get", "/stat/tech/java", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse));
	}

	/**
	 * Возвращает данные о визитах посетителей с отключенными Cookies.
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1   Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2   Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort    оле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse Режим сортировки данных.
	 */
	public function StatTechCookies($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null) {
		return $this -> QueryYandex("get", "/stat/tech/cookies", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse));
	}

	/**
	 * Возвращает данные о визитах посетителей с отключенным JavaScript (ECMAScript).
	 * @param integer $id      Идентификатор счетчика.
	 * @param integer $goal_id Идентификатор цели счетчика для получения целевого отчета.
	 * @param string  $date1   Дата начала периода выборки в формате YYYYMMDD.
	 * @param string  $date2   Дата окончания периода выборки в формате YYYYMMDD.
	 * @param string  $sort    Поле данных отчета, по которому необходимо отсортировать результаты запроса.
	 * @param integer $reverse Режим сортировки данных.
	 */
	public function StatTechJavaScript($id, $goal_id, $date1 = null, $date2 = null, $sort = null, $reverse = null) {

		return $this -> QueryYandex("get", "/stat/tech/javascript", array("id" => $id, "goal_id" => $goal_id, "date1" => $date1, "date2" => $date2, "sort" => $sort, "reverse" => $reverse));
	}

}

class YandexMetrikaApiException extends Exception {
}
?>