<?php

namespace XLab\Dependencies\Database\Proper;

use Doctrine\DBAL\Connection;

class DatabaseDoctrineDBALAdapter implements DatabaseInterface
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function find($tableName, $id)
    {
        return $this->connection->fetchAssoc(
            sprintf('SELECT * FROM %s WHERE id = :id', $tableName),
            compact('id')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function update($tableName, $id, array $values)
    {
        $this->connection->update($tableName, $values, compact('id'));
    }
}