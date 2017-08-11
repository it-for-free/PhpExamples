<?php
//namespace it-for-free\PhpExamples\MVC;
namespace ItForFree\PhpExamples\MVC;

/**
 * Простейший класс для работы с представлениями
 * Предполагается, что представления лежат в корне Вашего сайта в папке "views"
 * 
 */
class SimpleView {
    /**
     * @var string Стандартный путь к корневому каталогу 
     */
    public $templateBasePath = '/';
    
    /**
     * @var array Массив, содержащий все переменные программы для их 
     * транспортировки из области видимости контроллеров в представления
     */
    private $vars = [];
    
    /**
     * @var string Путь к общему "подвалу" сайта
     * Файл лежит непосредственно в папке "views"
     */
    public $footerFilePath = 'footer.php';
    
    /**
     * @var string Путь к общей "шапке" сайта
     * Файл лежит непосредственно в папке "views"
     */
    public $headerFilePath = 'header.php';
   
    /**
     * Задаёт путь к корневому каталогу
     */
    public function __construct() {
        $this->templateBasepath = $_SERVER['DOCUMENT_ROOT'] 
                . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
    }

    /**
     * Добавить переменную в шаблон
     * 
     * @param type $name
     * @param type $value
     */
    public function addVar($name, $value)
    {
        $this->vars[$name] = $value;
    }

    /**
     * Формирует окончательное представление страницы. Собирает базовый HTML
     * и индивидуальный для каждой страницы
     * 
     * @param string Путь к целевой странице
     */
    public function render($path)
    {
        extract($this->vars);
                
        include($this->templateBasepath . $this->headerFilePath);
        
        include($this->templateBasepath . $path);
        
        include($this->templateBasepath . $this->footerFilePath);
        
    }
    
    /**
     * Формирует частичную печать страницы. Собирает базовый HTML
     * и индивидуальный для каждой страницы
     * 
     * @param string Путь к целевой странице
     */
    public function renderPartition($path)
    {
        extract($this->vars);
                
        include($this->templateBasepath . $path);
        
    }
}
