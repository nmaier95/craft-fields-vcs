<?php
/**
 * craft-fields-vcs plugin for Craft CMS 3.x
 *
 * Export fields as json to get them into your vcs of choice.  Import them into your cms instance as well.
 *
 * @link      https://github.com/nmaier95
 * @copyright Copyright (c) 2018 Niklas Maier
 */

namespace nmaier95\craftfieldsvcs\controllers;

use craft\records\Field;
use nmaier95\craftfieldsvcs\Craftfieldsvcs;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Niklas Maier
 * @package   Craftfieldsvcs
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'cp-template'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/craft-fields-vcs/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the DefaultController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/craft-fields-vcs/default/do-something
     *
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \yii\base\Exception
     */
    public function actionCpTemplate()
    {
        $success = Craft::$app->getRequest()->getQueryParam('success') === 'true' ? true : false;
        return $this->renderTemplate('craft-fields-vcs/_index', [
            'success' => $success
        ]);
    }


    public function actionExport() {
        $fields = Field::find()->all();

        return $this->redirect('/admin/fieldsvcs?success=true');
    }
}
