<?php
 
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * ProductMetas Controller
 *
 * @property \App\Model\Table\ProductMetasTable $ProductMetas
 *
 * @method \App\Model\Entity\ProductMeta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductMetasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MetaProducts']
        ];
        $productMetas = $this->paginate($this->ProductMetas);

        $this->set(compact('productMetas'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Meta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productMeta = $this->ProductMetas->get($id, [
            'contain' => ['MetaProducts']
        ]);

        $this->set('productMeta', $productMeta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productMeta = $this->ProductMetas->newEntity();
        if ($this->request->is('post')) {
            $productMeta = $this->ProductMetas->patchEntity($productMeta, $this->request->getData());
            if ($this->ProductMetas->save($productMeta)) {
                $this->Flash->success(__('The product meta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product meta could not be saved. Please, try again.'));
        }
        $metaProducts = $this->ProductMetas->MetaProducts->find('list', ['limit' => 200]);
        $this->set(compact('productMeta', 'metaProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Meta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productMeta = $this->ProductMetas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productMeta = $this->ProductMetas->patchEntity($productMeta, $this->request->getData());
            if ($this->ProductMetas->save($productMeta)) {
                $this->Flash->success(__('The product meta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product meta could not be saved. Please, try again.'));
        }
        $metaProducts = $this->ProductMetas->MetaProducts->find('list', ['limit' => 200]);
        $this->set(compact('productMeta', 'metaProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Meta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productMeta = $this->ProductMetas->get($id);
        if ($this->ProductMetas->delete($productMeta)) {
            $this->Flash->success(__('The product meta has been deleted.'));
        } else {
            $this->Flash->error(__('The product meta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function AdminaddMetas()
    {
        
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $product_meta_field_name = $this->request->data['product_meta_field_name'];
            $product_meta_field_value = $this->request->data['product_meta_field_value'];
            
            $count = $product_meta_field_name;
            $updatedMetaData = array();
            for ($i = 0; $i < count($count); $i++) {
                $productMeta = $this->ProductMetas->newEntity();
                $productMeta['product_meta_field_name'] = filter_var($product_meta_field_name[$i],FILTER_SANITIZE_STRING);
                $productMeta['product_meta_field_value'] = filter_var($product_meta_field_value[$i],FILTER_SANITIZE_STRING);
                
                $productMeta['created_by'] = $this->Auth->user('id');
                $this->ProductMetas->save($productMeta);
                $updatedMetaData[] = $productMeta;
            }
           echo json_encode($updatedMetaData);
        }
        
    }


    public function Adminadd()
    {
        // $this->autoRender = false;
        // if ($this->request->is('post')) {
        //     if (!empty($this->request->data('product_meta_field_value'))) {
        //         $productImg = $this->request->data('product_meta_field_value');
        //         foreach ($productImg as $info) {
        //             $ext = pathinfo($info, PATHINFO_EXTENSION);
        //             if ($ext == 'jpg') {
        //                 $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.jpg';
        //                 $uploadImg = $this->_move_image($this->request->data('product_meta_field_value'), $image_name);
        //                 $image_hight = $this->request->data['image_hight'];
        //                 $image_weight = $this->request->data['image_weight'];
        //                 $image_hight = explode(",", $image_hight);
        //                 $image_weight = explode(",", $image_weight);
        //                 $path2 = WWW_ROOT . 'productImage/productImage/';
        //                 $filename = $uploadImg;
        //                 list($width, $height) = getimagesize($filename);
        //                 $src = imagecreatefromjpeg($filename);
        //                 $updatedData = array();
        //                 for ($i = 0; $i < count($image_hight); $i++) {
        //                     $newheight = $image_hight[$i];
        //                     $newwidth = $image_weight[$i];
        //                     $tmp = imagecreatetruecolor($newwidth, $newheight);
        //                     imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        //                     $productNewName = ('a' . uniqid(mt_rand(10, 15)) . '_' . time() . '_50x50.' . $i . '.jpg');
        //                     imagejpeg($tmp, $path2 . $productNewName);
        //                     $productMeta = $this->ProductMetas->newEntity();
        //                     $productMeta['product_meta_field_name'] = "product_resize_images";
        //                     $productMeta['product_meta_field_value'] = $productNewName;
        //                     $updatedData[] = $productMeta;
        //                     $productMeta['mainImage'] = $image_name;
        //                     $productMeta['created_by'] = $this->Auth->user('id');
        //                     $this->ProductMetas->save($productMeta);
        //                 }
        //             } elseif ($ext == 'png') {
        //                 $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.png';
        //                 $uploadImg = $this->_move_image($this->request->data('product_meta_field_value'), $image_name);
        //                 $image_hight = $this->request->data['image_hight'];
        //                 $image_weight = $this->request->data['image_weight'];
        //                 $image_hight = explode(",", $image_hight);
        //                 $image_weight = explode(",", $image_weight);
        //                 $path2 = WWW_ROOT . 'productImage/productImage/';
        //                 $filename = $uploadImg;
        //                 list($width, $height) = getimagesize($filename);
        //                 $src = imagecreatefrompng($filename);
        //                 $updatedData = array();
        //                 for ($i = 0; $i < count($image_hight); $i++) {
        //                     $newheight = $image_hight[$i];
        //                     $newwidth = $image_weight[$i];
        //                     $tmp = imagecreatetruecolor($newwidth, $newheight);
        //                     imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        //                     $productNewName = ('a' . uniqid(mt_rand(10, 15)) . '_' . time() . '_' . $newheight . 'X' . $newwidth . $i . '.png');
        //                     imagepng($tmp, $path2 . $productNewName);
        //                     $productMeta = $this->ProductMetas->newEntity();
        //                     $productMeta['product_meta_field_name'] = "product_resize_images";
        //                     $productMeta['product_meta_field_value'] = $productNewName;
        //                     $updatedData[] = $productMeta;
        //                     $productMeta['mainImage'] = $image_name;
        //                     $productMeta['created_by'] = $this->Auth->user('id');
        //                     $this->ProductMetas->save($productMeta);
        //                 }
        //             } elseif ($ext == 'jpeg') {
        //                 $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.jpeg';
        //                 $uploadImg = $this->_move_image($this->request->data('product_meta_field_value'), $image_name);
        //                 $image_hight = $this->request->data['image_hight'];
        //                 $image_weight = $this->request->data['image_weight'];
        //                 $image_hight = explode(",", $image_hight);
        //                 $image_weight = explode(",", $image_weight);
        //                 $path2 = WWW_ROOT . 'productImage/productImage/';
        //                 $filename = $uploadImg;
        //                 list($width, $height) = getimagesize($filename);
        //                 $src = imagecreatefromjpeg($filename);
        //                 $updatedData = array();
        //                 for ($i = 0; $i < count($image_hight); $i++) {
        //                     $newheight = $image_hight[$i];
        //                     $newwidth = $image_weight[$i];
        //                     $tmp = imagecreatetruecolor($newwidth, $newheight);
        //                     imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        //                     $productNewName = ('a' . uniqid(mt_rand(10, 15)) . '_' . time() . '_50x50.' . $i . '.jpeg');
        //                     imagejpeg($tmp, $path2 . $productNewName);
        //                     $productMeta = $this->ProductMetas->newEntity();
        //                     $productMeta['product_meta_field_name'] = "product_resize_images";
        //                     $productMeta['product_meta_field_value'] = $productNewName;
        //                     $productMeta['created_by'] = $this->Auth->user('id');
        //                     $updatedData[] = $productMeta;
        //                     $productMeta['mainImage'] = $image_name;
        //                     $this->ProductMetas->save($productMeta);
        //                 }
        //             }
        //         }
        //         echo json_encode($updatedData);
        //         die();
        //     }
        // }
        
        
        
        
        $this->autoRender = false;
        if ($this->request->is('post')) {
            
        //     echo "<pre>";
        // print_r($this->request->data());
        // die();
        
        // $productSubImg = $this->request->data('sub_category_featured_image');
        

        // $size = filesize('sub_category_featured_image');

        // print_r($size);
        
        // die();
        
            $productMeta = $this->ProductMetas->newEntity();
            $productSubImg = $this->request->data('product_meta_field_value');
            
            
            
            $productMeta['product_meta_field_name'] = "product_resize_images";
            $productMeta['deleted'] = "0";
            $productMeta['created_by'] = $this->Auth->user('id');
            foreach ($productSubImg as $info) {
                $ext = pathinfo($info, PATHINFO_EXTENSION);
                if ($ext == 'jpg') {
                    $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.jpg';
                    $productMeta['product_meta_field_value'] = $image_name;
                    $uploadImg = $this->_move_image($this->request->data('product_meta_field_value'), $image_name);
                } elseif ($ext == 'png') {
                    $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.png';
                    $productMeta['product_meta_field_value'] = $image_name;
                    $uploadImg = $this->_move_image($this->request->data('product_meta_field_value'), $image_name);
                } elseif ($ext == 'jpeg') {
                    $image_name = "Klubhaus" . uniqid(mt_rand(10, 750)) . '.jpeg';
                    $productMeta['product_meta_field_value'] = $image_name;
                    $uploadImg = $this->_move_image($this->request->data('product_meta_field_value'), $image_name);
                } 
            }

                $this->autoRender = false;
                echo json_encode($productMeta);
                die();
        }
    
        
        
        
    }

    private function _move_image($uploadImg, $image_name)
    {
        $path = WWW_ROOT . 'productImage/productImage/' . $image_name;
        move_uploaded_file($uploadImg['tmp_name'], $path);
        return $path;
    }


    public function AdminMultiImageUpld()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $product_meta_field_value = $this->request->data['product_meta_field_value'];
            $updatedData = array();
            foreach ($product_meta_field_value as $value) {
                $ext = pathinfo($value['name'], PATHINFO_EXTENSION);
                if ($ext == 'jpg') {
                    $productNewName = $value['name'] = "RelatedImage" . uniqid(mt_rand(10, 700)) . '.jpg';
                    $path = WWW_ROOT . 'productImage/ProductRelated/' . $value['name'];
                    if (move_uploaded_file($value["tmp_name"], $path)) {
                        $productMeta = $this->ProductMetas->newEntity();
                        $productMeta['product_meta_field_name'] = "product_related_images";
                        $productMeta['product_meta_field_value'] = $productNewName;
                        $productMeta['created_by'] = $this->Auth->user('id');
                        $returnMetaId = $this->ProductMetas->save($productMeta);
                        $updatedData[] = $returnMetaId;
                    }
                } elseif ($ext == 'png') {
                    $productNewName = $value['name'] = "RelatedImage" . uniqid(mt_rand(10, 700)) . '.png';
                    $path = WWW_ROOT . 'productImage/ProductRelated/' . $value['name'];
                    if (move_uploaded_file($value["tmp_name"], $path)) {
                        $productMeta = $this->ProductMetas->newEntity();
                        $productMeta['product_meta_field_name'] = "product_related_images";
                        $productMeta['product_meta_field_value'] = $productNewName;
                        $productMeta['created_by'] = $this->Auth->user('id');
                        $returnMetaId = $this->ProductMetas->save($productMeta);
                        $updatedData[] = $returnMetaId;
                    }
                } elseif ($ext == 'jpeg') {
                    $productNewName = $value['name'] = "RelatedImage" . uniqid(mt_rand(10, 700)) . '.jpeg';
                    $path = WWW_ROOT . 'productImage/ProductRelated/' . $value['name'];
                    if (move_uploaded_file($value["tmp_name"], $path)) {
                        $productMeta = $this->ProductMetas->newEntity();
                        $productMeta['product_meta_field_name'] = "product_related_images";
                        $productMeta['product_meta_field_value'] = $productNewName;
                        $productMeta['created_by'] = $this->Auth->user('id');
                        $returnMetaId = $this->ProductMetas->save($productMeta);
                        $updatedData[] = $returnMetaId;
                    }
                }
            }
            echo json_encode($updatedData);
            die();
        }
    }


    public function AdminupdateAddedImage()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $productImg = $this->request->data('product_meta_field_value');
            $ext = pathinfo($productImg, PATHINFO_EXTENSION);
            if ($ext == 'jpg') {
                $image_hight = $this->request->data['image_hight'];
                $image_weight = $this->request->data['image_weight'];
                $image_hight = explode(",", $image_hight);
                $image_weight = explode(",", $image_weight);
                $path = WWW_ROOT . '/productImage/productImage/';
                $filename = $path . $productImg;
                list($width, $height) = getimagesize($filename);
                $src = imagecreatefromjpeg($filename);
                $updatedData = array();
                for ($i = 0; $i < count($image_hight); $i++) {
                    $newheight = $image_hight[$i];
                    $newwidth = $image_weight[$i];
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    $productNewName = ('a' . uniqid(mt_rand(10, 15)) . '_' . time() . '_' . $newheight . 'X' . $newwidth . $i . '.jpg');
                    imagejpeg($tmp, $path . $productNewName);
                    $productMeta = $this->ProductMetas->newEntity();
                    $productMeta['product_meta_field_name'] = "product_resize_images";
                    $productMeta['product_meta_field_value'] = $productNewName;
                    $productMeta['meta_product_id'] = $this->request->data('products_id');
                    $updatedData[] = $productMeta;
                    $productMeta['mainImage'] = $productImg;
                    $productMeta['updated_by'] = $this->Auth->user('id');
                    if ($this->ProductMetas->save($productMeta)) {
                    }
                }
            } elseif ($ext == 'png') {
                $image_hight = $this->request->data['image_hight'];
                $image_weight = $this->request->data['image_weight'];
                $image_hight = explode(",", $image_hight);
                $image_weight = explode(",", $image_weight);
                $path = WWW_ROOT . '/productImage/productImage/';
                $filename = $path . $productImg;
                list($width, $height) = getimagesize($filename);
                $src = imagecreatefrompng($filename);
                $updatedData = array();
                for ($i = 0; $i < count($image_hight); $i++) {
                    $newheight = $image_hight[$i];
                    $newwidth = $image_weight[$i];
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    $productNewName = ('a' . uniqid(mt_rand(10, 15)) . '_' . time() . '_' . $newheight . 'X' . $newwidth . $i . '.png');
                    imagepng($tmp, $path . $productNewName);
                    $productMeta = $this->ProductMetas->newEntity();
                    $productMeta['product_meta_field_name'] = "product_resize_images";
                    $productMeta['product_meta_field_value'] = $productNewName;
                    $productMeta['meta_product_id'] = $this->request->data('products_id');
                    $productMeta['updated_by'] = $this->Auth->user('id');
                    $updatedData[] = $productMeta;
                    $productMeta['mainImage'] = $productImg;
                    if ($this->ProductMetas->save($productMeta)) {
                    }
                }
            } elseif ($ext == 'jpeg') {
                $image_hight = $this->request->data['image_hight'];
                $image_weight = $this->request->data['image_weight'];
                $image_hight = explode(",", $image_hight);
                $image_weight = explode(",", $image_weight);
                $path = WWW_ROOT . '/productImage/productImage/';
                $filename = $path . $productImg;
                list($width, $height) = getimagesize($filename);
                $src = imagecreatefromjpeg($filename);
                $updatedData = array();
                for ($i = 0; $i < count($image_hight); $i++) {
                    $newheight = $image_hight[$i];
                    $newwidth = $image_weight[$i];
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    $productNewName = ('a' . uniqid(mt_rand(10, 15)) . '_' . time() . '_' . $newheight . 'X' . $newwidth . $i . '.jpeg');
                    imagejpeg($tmp, $path . $productNewName);
                    $productMeta = $this->ProductMetas->newEntity();
                    $productMeta['product_meta_field_name'] = "product_resize_images";
                    $productMeta['product_meta_field_value'] = $productNewName;
                    $productMeta['meta_product_id'] = $this->request->data('products_id');
                    $updatedData[] = $productMeta;
                    $productMeta['mainImage'] = $productImg;
                    $productMeta['updated_by'] = $this->Auth->user('id');
                    if ($this->ProductMetas->save($productMeta)) {
                    }
                }
            }
        echo json_encode($updatedData);
        die();
        }
    }


    public function AdmindeleteResizeImage()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('products_id');
            $productMeta = $this->ProductMetas->find()->where(['meta_product_id' => $id, 'product_meta_field_name' => 'product_resize_images', 'deleted' => 0])->all();
            foreach ($productMeta as $information) {
                $dirname = WWW_ROOT . 'productImage/productImage/';
                $filenames = $dirname . $information['product_meta_field_value'];
                unlink($filenames);
                $information['deleted'] = 1;
                $information['updated_by'] = $this->Auth->user('id');
                $this->ProductMetas->save($information);
            }
        echo json_encode($information);
        die();
        }
    }

    public function AdminUpdateMultiImageUpld()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $product_meta_field_value = $this->request->data['product_meta_field_value'];
            $id = $this->request->data['products_id'];
            foreach ($product_meta_field_value as $value) {
                $ext = pathinfo($value['name'], PATHINFO_EXTENSION);
                if ($ext == 'jpg') {
                    $productNewName = $value['name'] = "RelatedImage" . uniqid(mt_rand(10, 750)) . '.jpg';
                    $path = WWW_ROOT . 'productImage/ProductRelated/' . $value['name'];
                    if (move_uploaded_file($value["tmp_name"], $path)) {
                        $productMeta = $this->ProductMetas->newEntity();
                        $productMeta['product_meta_field_name'] = "product_related_images";
                        $productMeta['product_meta_field_value'] = $productNewName;
                        $productMeta['meta_product_id'] = $id;
                        $productMeta['updated_by'] = $this->Auth->user('id');
                        $this->ProductMetas->save($productMeta);
                    }
                } elseif ($ext == 'png') {
                    $productNewName = $value['name'] = "RelatedImage" . uniqid(mt_rand(10, 750)) . '.png';
                    $path = WWW_ROOT . 'productImage/ProductRelated/' . $value['name'];
                    if (move_uploaded_file($value["tmp_name"], $path)) {
                        $productMeta = $this->ProductMetas->newEntity();
                        $productMeta['product_meta_field_name'] = "product_related_images";
                        $productMeta['product_meta_field_value'] = $productNewName;
                        $productMeta['meta_product_id'] = $id;
                        $productMeta['updated_by'] = $this->Auth->user('id');
                        $this->ProductMetas->save($productMeta);
                    }
                } else {
                    $productNewName = $value['name'] = "RelatedImage" . uniqid(mt_rand(10, 750)) . '.jpeg';
                    $path = WWW_ROOT . 'productImage/ProductRelated/' . $value['name'];
                    if (move_uploaded_file($value["tmp_name"], $path)) {
                        $productMeta = $this->ProductMetas->newEntity();
                        $productMeta['product_meta_field_name'] = "product_related_images";
                        $productMeta['product_meta_field_value'] = $productNewName;
                        $productMeta['meta_product_id'] = $id;
                        $productMeta['updated_by'] = $this->Auth->user('id');
                        $this->ProductMetas->save($productMeta);
                    }
                }
            }
            return $this->redirect($this->referer());
        }
    }


    public function coverimagelistview()
    {
        $productSliderImage = TableRegistry::get('ShopProducts')->find('all')
        ->contain(['ProductMetas' => ['conditions' => ['product_meta_field_name !=' => '', 'ProductMetas.deleted' => 0,
                'OR' => [['product_meta_field_name' => "Slider_Image"], ['product_meta_field_name' => "Slider_Image_Mobo"], ['product_meta_field_name' => "Slider_Title"]]
            ]]]);
        $this->paginate = array(
            'limit' => 20,
        );
        $this->set(compact('productSliderImage'));
    }


    public function addSliderImage()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            
            $productMeta = $this->ProductMetas->newEntity();
            $productMeta['product_meta_field_name'] = "Slider_Image";
            $productMeta['product_meta_field_value'] = filter_var($this->request->data('product_meta_field_title'),FILTER_SANITIZE_STRING);
            $productMeta['deleted'] = "0";
            $productMeta['created_by'] = $this->Auth->user('id');
            $productMeta = $this->ProductMetas->newEntity();
            $product_meta_image = $this->request->data('product_meta_field_imageUrl');
            
            $product_meta_imageMobo = $this->request->data('product_meta_field_imageUrl_mobo');
            
            $productMeta['deleted'] = "0";
            $productMeta['created_by'] = $this->Auth->user('id');
            $productMeta['product_meta_field_name'] = $this->request->data('product_meta_field_title');
            foreach ($product_meta_image as $info) {
                $ext = pathinfo($info, PATHINFO_EXTENSION);
            if ($ext == 'jpg') {
                    $image_name = "SliderImage" . uniqid(mt_rand(10, 750)) . '.jpg';
                    $productMeta['product_meta_field_value'] = $image_name;
                    $uploadImg = $this->_move_image_inslider($this->request->data('product_meta_field_imageUrl'), $image_name);
                } elseif ($ext == 'png') {
                    $image_name = "SliderImage" . uniqid(mt_rand(10, 750)) . '.png';
                    $productMeta['product_meta_field_value'] = $image_name;
                    $uploadImg = $this->_move_image_inslider($this->request->data('product_meta_field_imageUrl'), $image_name);
                } elseif ($ext == 'jpeg') {
                    $image_name = "SliderImage" . uniqid(mt_rand(10, 750)) . '.jpeg';
                    $productMeta['product_meta_field_value'] = $image_name;
                    $uploadImg = $this->_move_image_inslider($this->request->data('product_meta_field_imageUrl'), $image_name);
                }
            }
            
            foreach ($product_meta_imageMobo as $info) {
                $ext = pathinfo($info, PATHINFO_EXTENSION);
            if ($ext == 'jpg') {
                    $image_nameMobo = "SliderImageMobo" . uniqid(mt_rand(10, 750)) . '.jpg';
                    $productMeta['product_meta_field_value_Mobo'] = $image_nameMobo;
                    $uploadImg = $this->_move_Moboimage_inslider($this->request->data('product_meta_field_imageUrl_mobo'), $image_nameMobo);
                } elseif ($ext == 'png') {
                    $image_nameMobo = "SliderImageMobo" . uniqid(mt_rand(10, 750)) . '.png';
                    $productMeta['product_meta_field_value_Mobo'] = $image_nameMobo;
                    $uploadImg = $this->_move_Moboimage_inslider($this->request->data('product_meta_field_imageUrl_mobo'), $image_nameMobo);
                } elseif ($ext == 'jpeg') {
                    $image_nameMobo = "SliderImageMobo" . uniqid(mt_rand(10, 750)) . '.jpeg';
                    $productMeta['product_meta_field_value_Mobo'] = $image_nameMobo;
                    $uploadImg = $this->_move_Moboimage_inslider($this->request->data('product_meta_field_imageUrl_mobo'), $image_nameMobo);
                }
            }
            if ($productMeta) {
                echo json_encode($productMeta);
                die();
            }
        }
    }


    private function _move_image_inslider($uploadImg, $image_name)
    {
        $path = WWW_ROOT . 'productImage/Slider/' . $image_name;
        move_uploaded_file($uploadImg['tmp_name'], $path);
        return $path;
    } 
    
    
    private function _move_Moboimage_inslider($uploadImg, $image_nameMobo)
    {
        $path = WWW_ROOT . 'productImage/Slider/' . $image_nameMobo;
        move_uploaded_file($uploadImg['tmp_name'], $path);
        return $path;
    }


    public function deleteSlider($id = null)
    {
        $this->autoRender = false;
        $productMeta = $this->ProductMetas->find('all')->where(['meta_product_id' => $id,  'OR' => [['product_meta_field_name' => "Slider_Image"],['product_meta_field_name' => "Slider_Image_Mobo"], ['product_meta_field_name' => "Slider_Title"]], 'deleted' => 0 ]);
        foreach ($productMeta as $information){
            $information['deleted'] = 1;
            $information['updated_by'] = $this->Auth->user('id');
            $this->ProductMetas->save($information);
        }
        return $this->redirect($this->referer());
    }


    public function editSliderTitle()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->data('product_meta_id');
            $productMeta = $this->ProductMetas->get($id);
            $productMeta['product_meta_field_value'] = filter_var($this->request->data('product_meta_field_title'),FILTER_SANITIZE_STRING);
            $productMeta['updated_by'] = $this->Auth->user('id');
            $this->ProductMetas->save($productMeta);
            echo json_encode($productMeta);
            die();
        }
    }
    
    
    public function editSliderTitleColor()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) 
        {
            if(empty($this->request->data('product_meta_color_update')))
            {
                $productMeta = $this->ProductMetas->newEntity();
                $productMeta['meta_product_id'] = $this->request->data('meta_product_id');
                $productMeta['product_meta_field_name'] = "Slider_Title_Color";
                $productMeta['product_meta_field_value'] = $this->request->data('product_meta_field_title_color');
                $productMeta['created_by'] = $this->Auth->user('id');
                $this->ProductMetas->save($productMeta);
                echo json_encode($productMeta);
                die();
            }else{
                $id = $this->request->data('product_meta_id');
                $productMeta = $this->ProductMetas->get($id);
                $productMeta['product_meta_field_value'] = $this->request->data('product_meta_field_title_color');
                $productMeta['updated_by'] = $this->Auth->user('id');
                $this->ProductMetas->save($productMeta);
                echo json_encode($productMeta);
                die();
            }
        }
    }
    

    public function getSliderTitle()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->autoRender = false;
            $sliderTitle_id = $this->request->data('SliderTitleid');
            $productMetaTitile =$this->ProductMetas->find()->where(['meta_product_id' => $sliderTitle_id, 'product_meta_field_name' =>'Slider_Title', 'deleted' => 0])->last();
            echo json_encode($productMetaTitile);
            die();
        }
    }
    
    public function getSliderTitleColor()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->autoRender = false;
            $sliderTitle_id = $this->request->data('SliderTitleid');
            $productMetaTitile =$this->ProductMetas->find()->where(['meta_product_id' => $sliderTitle_id, 'product_meta_field_name' =>'Slider_Title_Color', 'deleted' => 0])->last();
            echo json_encode($productMetaTitile);
            die();
        }
    }
}
