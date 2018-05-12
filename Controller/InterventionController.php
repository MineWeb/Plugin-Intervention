<?php
/**
 * Kenshimdev : Développeur web et administrateur système (https://kenshimdev.fr/)
 * @author        Kenshimdev - https://kenshimdev.fr
 * @copyright     Kenshimdev - All rights reserved
 * @link          http://mineweb.org/market
 * @since         10.03.17
 */

class InterventionController extends AppController{

    /**
     * Called when the route /Intervention is called.
     */
    public function index(){
        //Load configuration
        $this->loadModel('Intervention.Interventions');
        //Retrieves the last 35 logs
        $Interventions = $this->Interventions->find('all', ['order' => ['created desc'], 'limit' => 35]);

        return $this->set(compact('Interventions'));
    }

    /**
     * Called when the route /admin/xenbridge is called.
     */
    public function admin_index(){
        if($this->isConnected && $this->User->isAdmin()){
            $this->layout = 'admin';

            //Get list of logs
            $this->loadModel('Intervention.Interventions');
            $Interventions = $this->Interventions->find('all', ['order' => ['id desc']]);

            if ($this->request->is('post')) {
                $Intervention_level = $this->request->data["level"];
                $Intervention_author = $this->request->data["author"];
                $Intervention_comment = $this->request->data["description"];

                //Form validation
                if(!isset($Intervention_level) || ($Intervention_level < 0 || $Intervention_level > 4)){
                    $this->Session->setFlash($this->Lang->get('CL_LEVEL_ERROR'), 'default.error');
                    return $this->redirect($this->referer());
                }

                if(!isset($Intervention_author) || empty($Intervention_author) || strlen($Intervention_author) < 2 || strlen($Intervention_author) > 50){
                    $this->Session->setFlash($this->Lang->get('CL_AUTHOR_ERROR'), 'default.error');
                    return $this->redirect($this->referer());
                }

                if(!isset($Intervention_comment) || empty($Intervention_comment) || strlen($Intervention_comment) < 10){
                    $this->Session->setFlash($this->Lang->get('CL_COMMENT_ERROR'), 'default.error');
                    return $this->redirect($this->referer());
                }

                //Add a new log
                $this->Interventions->create();
                if(
                    $this->Interventions->save(
                        ['level' => $Intervention_level, 
                        'author' => $Intervention_author, 
                        'description' => $Intervention_comment, 
                        'created' => date('Y-m-d H:i:s')
                   ])
                ){
                    $this->Session->setFlash($this->Lang->get('CL_ADD_SUCCESS'), 'default.success');
                    return $this->redirect($this->referer());
                }
              
                //error occurred
                $this->Session->setFlash($this->Lang->get('CL_ERROR_OCCURED'), 'default.error');
                return $this->redirect($this->referer());
            }

            return $this->set(compact('Interventions'));
        }else{
            return $this->redirect('/');
        }
    }

    /**
     * Deletes a log according to the id passed in parameter
     * @param $id - id of the log to delete
     */
    public function admin_delete($id = null){
        if($this->isConnected && $this->User->isAdmin()){
            
            if ($this->request->is('post')){
                throw new MethodNotAllowedException();
            }

            $this->loadModel('Intervention.Interventions');
            if ($this->Interventions->delete($id)){
                $this->Session->setFlash($this->Lang->get('CL_ADMIN_DELETE'), 'default.success');
            }

            return $this->redirect($this->referer());

        }else{
            return $this->redirect('/');
        }
    }

}
