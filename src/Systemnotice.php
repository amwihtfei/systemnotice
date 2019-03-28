<?php

    namespace man30\systemnotice;

    class Systemnotice
    {
        private $id, $uuid, $title, $desc, $content, $status, $created_at, $updated_at, $read_num;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getUuid()
        {
            return $this->uuid;
        }

        /**
         * @param mixed $uuid
         */
        public function setUuid($uuid)
        {
            $this->uuid = $uuid;

            return $this;
        }


        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getDesc()
        {
            return $this->desc;
        }

        /**
         * @param mixed $desc
         */
        public function setDesc($desc)
        {
            $this->desc = $desc;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getContent()
        {
            return $this->content;
        }

        /**
         * @param mixed $content
         */
        public function setContent($content)
        {
            $this->content = $content;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * @param mixed $status
         */
        public function setStatus($status)
        {
            $this->status = $status;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getCreatedAt()
        {
            return $this->created_at;
        }

        /**
         * @param mixed $created_at
         */
        public function setCreatedAt($created_at)
        {
            $this->created_at = $created_at;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getUpdatedAt()
        {
            return $this->updated_at;
        }

        /**
         * @param mixed $updated_at
         */
        public function setUpdatedAt($updated_at)
        {
            $this->updated_at = $updated_at;

            return $this;
        }

        /**
         * @return mixed
         */
        public function getReadNum()
        {
            return $this->read_num;
        }

        /**
         * @param mixed $read_num
         */
        public function setReadNum($read_num)
        {
            $this->read_num = $read_num;

            return $this;
        }

        //创建通知
        public function createNotice()
        {
            $data = [
                'uuid'       => $this->getUuid(),
                'title'      => $this->getTitle(),
                'desc'       => $this->getDesc(),
                'content'    => $this->getContent(),
                'created_at' => date('Y-m-d H:i:s'),
                'status'     => $this->getStatus(),
                'read_num'   => 0
            ];

            return \App\Models\Man30\SystemNotice::create($data);
        }

        //编辑通知
        public function editNotice()
        {
            $data = [
                'title'      => $this->getTitle(),
                'desc'       => $this->getDesc(),
                'content'    => $this->getContent(),
                'updated_at' => date('Y-m-d H:i:s'),
                'status'     => $this->getStatus()
            ];
            foreach ($data as $k => $v)
            {
                if (empty($v))
                {
                    unset($data[ $k ]);
                }
            }

            return \App\Models\Man30\SystemNotice::where('id', $this->getId())->update($data);
        }

        //获取通知列表
        public function getNotices()
        {
            return \App\Models\Man30\SystemNotice::where('title', 'like', '%' . $this->getTitle() . '%')->paginate();
        }

        //获取通知详情
        public function getNotice()
        {
            return \App\Models\Man30\SystemNotice::where('id', $this->getId())->first();
        }

        //删除通知
        public function deleteNotice()
        {
            return \App\Models\Man30\SystemNotice::where('id', $this->getId())->delete();
        }

        //阅读+1
        public function incRead()
        {
            return \App\Models\Man30\SystemNotice::where('id', $this->getId())->increment();
        }
    }