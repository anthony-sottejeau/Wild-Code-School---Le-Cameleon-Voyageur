<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 23/04/18
 * Time: 11:24
 */

namespace Structures;

use Model\PictureManager;


class File
{
    private const MIME_AUTHORIZED = ['image/png', 'image/gif', 'image/jpeg'];
    private $manager;
    private $directory;

    public function __construct(string $directory, PictureManager $manager)
    {
        $this->setDirectory($directory);
        $this->setManager($manager);
    }

    /**
     * @param array $file
     */
    public function add(array $file)
    {
        $notification = new Notification();
        if(in_array($file['file']['type'],self::MIME_AUTHORIZED)) {
            $extension = pathinfo($file['file']['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;
            $filePath = "assets/images/" . $this->directory . $filename;
            move_uploaded_file($file['file']['tmp_name'], '../public/' . $filePath);
            $this->manager->insert([
                'path'=>$filePath,
                'alt'=>$_POST['alt'],
            ]);
            $notification->setNotification('success', 'Ajout de fichier réussi');
        } else {
            $notification->setNotification('danger', 'Format de fichier non autorisé');
        }
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $notification = new Notification();
        $file = $this->manager->selectOneById($id);
        if (!empty($file)) {
            unlink('../public/' . $file->getPath());
            $this->manager->delete($id);
            $notification->setNotification('success', 'Suppression de fichier réussi');
        }
    }

    /**
     * @return string
     */
    public function getDirectory(): string
    {
        return $this->directory;
    }

    /**
     * @param string $directory
     */
    public function setDirectory(string $directory): void
    {
        $this->directory = $directory . '/';
    }

    /**
     * @return mixed
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param mixed $manager
     */
    public function setManager($manager): void
    {
        $this->manager = $manager;
    }
}