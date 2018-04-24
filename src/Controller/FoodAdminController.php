<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 18/04/18
 * Time: 09:41
 */

namespace Controller;

use Model\CategoryManager;
use Model\FoodManager;

class FoodAdminController extends \Controller\AbstractController
{
    public function index()
    {
        $foodManager = new FoodManager();
        $foods = $foodManager->selectFoodByCategory();
        $foodCategories = [];
        foreach ($foods as $food) {
            $foodCategories[$food['category']]['name'] = $food['categoryName'];
            $foodCategories[$food['category']]['produits'][] = $food;
        }
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();
        foreach ($categories as $category) {
            if (isset($foodCategories[$category->getId()])) {
                $foodCategories[$category->getId()]['deletable'] = false;
            } else {
                $foodCategories[$category->getId()]['deletable'] = true;
                $foodCategories[$category->getId()]['name'] = $category->getName();
            }
        }
        return $this->twig->render('admin/food.html.twig', ['foodCategories' => $foodCategories, 'categories' => $categories]);
    }

    public function showProduct(int $id)
    {
        $productManager = new FoodManager();
        $categoryManager = new CategoryManager();
        $product = $productManager->selectOneById($id);
        $categories = $categoryManager->selectAll();

        return $this->twig->render('admin/showProduct.html.twig', ['product' => $product, 'categories' => $categories]);
    }

    public function showCategory(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneById($id);
        return $this->twig->render('admin/showCategory.html.twig', ['category' => $category]);
    }

    public function editCategory()
    {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $cleanPost[$key] = trim($value);
            }
            $categoryManager = new CategoryManager();
            $categoryManager->update($cleanPost['id'], [
                'name' => $cleanPost['name'],
            ]);
            header('location:/admin/menu');
            exit();
        }
        // #TODO gestion des erreurs et notifications
    }

    public function editProduct()
    {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $cleanPost[$key] = trim($value);
            }
            $productManager = new FoodManager();
            $productManager->update($cleanPost['id'], [
                'name' => $cleanPost['name'],
                'price' => $cleanPost['price'],
                'ingredients' => $cleanPost['ingredients'],
                'category' => $cleanPost['category'],

            ]);
            header('location:/admin/menu');
            exit();
        }
        // #TODO gestion des erreurs et notifications
    }


    public function deleteProduct()
    {
        $id = $_POST['id'];
        $foodManager = new FoodManager();
        $foodManager->delete($id);
        header('location:/admin/menu');
        exit();
    }

    public function deleteCategory()
    {
        $id = $_POST['id'];
        $categoryManager = new CategoryManager();
        $categoryManager->delete($id);
        header('location:/admin/menu');
        exit();
    }

    public function insertProduct()
    {
        $foodManager = new FoodManager();
        $foodManager->insert([
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'ingredients' => $_POST['ingredients'],
            'category' => $_POST['category'],
        ]);
        header('location:/admin/menu');
        exit();
        // #TODO gestion des erreurs et notifications
    }

    public function showNewProduct()
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();
        return $this->twig->render('/admin/showNewProduct.html.twig', ['categories' => $categories]);
    }

    public function insertCategory()
    {
        $categoryManager = new CategoryManager();
        $categoryManager->insert([
            'name' => $_POST['name'],
        ]);
        header('location:/admin/menu');
        exit();
        // #TODO gestion des erreurs et notifications
    }

    public function showNewCategory()
    {
        return $this->twig->render('/admin/showNewCategory.html.twig');
    }
}
